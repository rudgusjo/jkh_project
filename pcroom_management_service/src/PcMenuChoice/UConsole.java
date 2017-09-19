package PcMenuChoice;

import java.awt.Font;
import java.awt.Graphics;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;

import javax.imageio.ImageIO;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.Timer;

public class UConsole {
	
		BufferedImage BGimg = null;
		int frameWidth = 415;
		int frameHeight= 345;
		
		JFrame userFrame;
		JLabel userNameTitle;
		JLabel useTimeTitle;
		JLabel useFeeTitle;
		JLabel moveSeatTitle;
		JLabel userName;
		JLabel useTime;
		String uTime;
		JLabel useFee;
		JComboBox moveSeat = null;
		JButton useEnd;
		ButtonHandler bh;
		PCListManagement pcList;
		UsePC uPC;
		
		ViewSetRun vsRun;
		Thread vsTh;
/*		long startTime;
		boolean useEndJudge = true;
		TimeRun timeR;
		Thread timeTh;*/
		Font uFont = new Font("HY엽서M",Font.BOLD,14);
/*		
		FeeRun FeeR;
		Thread FeeTh;*/

	public UConsole(UsePC uPC,PCListManagement pcList){
		
		this.uPC = uPC; 
		this.pcList = pcList;	
		
		userFrame = new JFrame(); 
		userFrame.setTitle("user");
		userFrame.setSize(frameWidth,frameHeight);
		userFrame.setLayout(null);
		userFrame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);

		String uFee  = "1100";

		try{
			BGimg = ImageIO.read(new File("img/UserConsole.jpg"));
		}catch(IOException e){
			System.out.println("이미지 불러오기 실패!");
			System.exit(0);
		}
		
		userNameTitle = new JLabel(){ImageIcon i = new ImageIcon("img/UserName.gif");
    	public void paintComponent(Graphics g) {
    		g.drawImage(i.getImage(), 0, 0, 76, 25, null);
    		}
		};
		userNameTitle.setLocation(15, 209);
		userNameTitle.setSize(76, 25);
		
		
		useTimeTitle = new JLabel(){ImageIcon i = new ImageIcon("img/UseTime.gif");
    	public void paintComponent(Graphics g) {
    		g.drawImage(i.getImage(), 0, 0, 76, 25, null);
    		}
		};
		useTimeTitle.setLocation(112, 209);
		useTimeTitle.setSize(76, 25);
		
		useFeeTitle = new JLabel(){ImageIcon i = new ImageIcon("img/UseFee.gif");
    	public void paintComponent(Graphics g) {
    		g.drawImage(i.getImage(), 0, 0, 76, 25, null);
    		}
		};
		useFeeTitle.setLocation(208, 209);
		useFeeTitle.setSize(76, 25);
		
		moveSeatTitle = new JLabel(){ImageIcon i = new ImageIcon("img/MoveSeat.gif");
    	public void paintComponent(Graphics g) {
    		g.drawImage(i.getImage(), 0, 0, 76, 25, null);
    		}
		};
		moveSeatTitle.setLocation(305, 209);
		moveSeatTitle.setSize(76, 25);
		
		//============Time 쓰레드============
		
		
		//============Fee 쓰레드=============
		

		//=======각 라벨 및 버튼 설정 ========
		userName = new JLabel(uPC.user.getName());
		userName.setLocation(22, 257);
		userName.setSize(90, 25);
		userName.setFont(PCROOM.useFont);
		
		useTime = new JLabel(uPC.useTime);
		useTime.setLocation(111, 257);
		useTime.setSize(150, 25);
		useTime.setFont(this.uFont);
	
		
		useFee = new JLabel(uPC.useFee+"원");
		useFee.setLocation(214, 257);
		useFee.setSize(100, 25);
		useFee.setFont(this.uFont);
		
		moveSeat = new JComboBox(pcList.PcListDB);
		moveSeat.setLocation(303, 256);
		moveSeat.setSize(76, 25);
		moveSeat.setFont(PCROOM.useFont);
		
		useEnd = new JButton();
		useEnd.setLocation(145, 92);
		useEnd.setSize(100, 25);
		useEnd.setFont(PCROOM.useFont);
		useEnd.setBorderPainted(false);
		useEnd.setFocusPainted(false);
		useEnd.setContentAreaFilled(false);
		bh = new ButtonHandler();
		useEnd.addActionListener(bh);
		
		this.vsRun = new ViewSetRun();
		this.vsTh = new Thread(this.vsRun);
		
		this.vsTh.start();
		
		try {
			this.vsTh.sleep(500);
		} catch (InterruptedException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
		
		//컴포넌트 추가
		userFrame.add(userNameTitle);
		userFrame.add(useTimeTitle);
		userFrame.add(useFeeTitle);
		userFrame.add(moveSeatTitle);
		userFrame.add(userName);
		userFrame.add(useTime);
		userFrame.add(useFee);
		userFrame.add(moveSeat);
		userFrame.add(useEnd);
		
		MyPanel mp = new MyPanel();
		mp.setBounds(0, 0, frameWidth, frameHeight);
		userFrame.add(mp);
		
		userFrame.setVisible(true);
	}
	
	//사용종료 버튼 핸들러
	class ButtonHandler implements ActionListener{	

		public void actionPerformed(ActionEvent e) {
			Object obj = e.getSource();
			if(obj == useEnd){	//종료 버튼 클릭시
				userFrame.setVisible(false);
			}
		}
	}
	
	class MyPanel extends JPanel{
		public void paint(Graphics g){
			g.drawImage(BGimg, 0, 0, null);
		}
	}
	
	class ViewSetRun implements Runnable{

		public void run(){
			while(true){
				useTime.setText(uPC.useTime);
				useFee.setText(uPC.useFee);
			}			
		}
	}
}




