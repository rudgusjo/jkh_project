package PcMenuChoice;

import java.awt.Graphics;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Iterator;

import javax.imageio.ImageIO;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;

public class ManagerConsole {
	BufferedImage BGimg = null;
	JFrame mConsoleFrame = new JFrame();
	ButtonHandler bh;
	//pc버튼
	JButton pc1;
	JButton pc2;
	JButton pc3;
	JButton pc4;
	JButton pc5;
	JButton pc6;
	JButton pc7;
	ArrayList<JButton> pcBtList = new ArrayList(); 
	String[] useOrwait = new String[7]; 
	Iterator itr; 
	//클릭된 버튼 정보저장 객체
	UsePC clickedUpc;
	
	//pc세부정보 라벨
	JLabel usingPCLabel;
	JLabel startTimeLabel;
	JLabel usingTimeLabel;
	JLabel usingFeeLabel;
	
	//pc 실시간 정보 업데이트 쓰레드
	PCListManagement pcList;
	PcViewRun pcViewR;
	Thread pcViewTh; 

	//각 pc클릭시 받아오는 문자열 정보 저장 변수
	String saveUsingPCstr;
	String saveStartTimestr;
	String saveUsingTimestr;
	String saveusingFeestr;
	
	boolean[] judgeUsePcList = new boolean[pcBtList.size()];
	
	public ManagerConsole(PCListManagement pcList){
		this.pcList = pcList; 
		mConsoleFrame.setTitle("관리자 콘솔창");
		mConsoleFrame.setSize(PCROOM.width,PCROOM.height);
		mConsoleFrame.setLayout(null);
		mConsoleFrame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
		
		try{
			BGimg = ImageIO.read(new File("img/mBackground.jpg"));
		}catch(IOException e){
			System.out.println("이미지 불러오기 실패!");
			System.exit(0);
		}
				
		bh = new ButtonHandler();
		
		pc1 = new JButton();
		pc1.setLocation(0, 0);
		pc1.setSize(146, 137);
		pcBtList.add(pc1);

		
		pc2 = new JButton();
		pc2.setLocation(170, 0);
		pc2.setSize(146, 137);
		pcBtList.add(pc2);

		pc3 = new JButton();
		pc3.setLocation(342, 0);
		pc3.setSize(146, 137);
		pcBtList.add(pc3);

		pc4 = new JButton();
		pc4.setLocation(0, 201);
		pc4.setSize(146, 138);
		pcBtList.add(pc4);

		pc5 = new JButton();
		pc5.setLocation(170, 201);
		pc5.setSize(146, 138);
		pcBtList.add(pc5);

		pc6 = new JButton();
		pc6.setLocation(342, 201);
		pc6.setSize(146, 138);
		pcBtList.add(pc6);

		pc7 = new JButton();
		pc7.setLocation(0, 402);
		pc7.setSize(146, 138);
		pcBtList.add(pc7);

		//버튼 옵션 추가 및 프레임 추가 작업
		//iterator 로 변경요망
		pcBtOptionAdd();
		
		usingPCLabel = new JLabel("");
		usingPCLabel.setLocation(670, 35);
		usingPCLabel.setSize(200, 138);
		usingPCLabel.setFont(PCROOM.useFont);
		
		startTimeLabel = new JLabel("");
		startTimeLabel.setLocation(605, 160);
		startTimeLabel.setSize(200, 138);
		startTimeLabel.setFont(PCROOM.useFont);

		usingTimeLabel = new JLabel("");
		usingTimeLabel.setLocation(605, 250);
		usingTimeLabel.setSize(200, 138);
		usingTimeLabel.setFont(PCROOM.useFont);
		
		usingFeeLabel = new JLabel("");
		usingFeeLabel.setLocation(620, 340);
		usingFeeLabel.setSize(180, 138);
		usingFeeLabel.setFont(PCROOM.useFont);
		
		mConsoleFrame.add(usingPCLabel);
		mConsoleFrame.add(startTimeLabel);
		mConsoleFrame.add(usingTimeLabel);
		mConsoleFrame.add(usingFeeLabel);
		
		mConsoleFrame.add(pc1);
		mConsoleFrame.add(pc2);
		mConsoleFrame.add(pc3);
		mConsoleFrame.add(pc4);
		mConsoleFrame.add(pc5);
		mConsoleFrame.add(pc6);
		mConsoleFrame.add(pc7);

		//이미지 패널 설정
		MyPanel mp = new MyPanel();
		mp.setBounds(0, 0, PCROOM.width, PCROOM.height);
		mConsoleFrame.add(mp);
		
		mConsoleFrame.setVisible(true);
	}

	public void pcBtOptionAdd(){
		for(int i=0;i<7;i++){
			pcBtList.get(i).setFont(PCROOM.useFont);
			pcBtList.get(i).setBorderPainted(false);
			pcBtList.get(i).setFocusPainted(false);
			pcBtList.get(i).setContentAreaFilled(false);
			pcBtList.get(i).addActionListener(bh);
		}
	}
	
	//각 pc 및 기능버튼 핸들러
	class ButtonHandler implements ActionListener{	//UserLogin의 모든 버튼 액션
		
		public void actionPerformed(ActionEvent e) {
			Object obj = e.getSource();
			if(obj == pc1){	
				clickedUpc = pcList.usePcList.get(0);
			}
			if(obj == pc2){	
				saveUsingPCstr 	 = "2번";
				saveStartTimestr = pcList.usePcList.get(0).useTime;
				saveUsingTimestr = pcList.usePcList.get(0).useTime;
				saveusingFeestr  = pcList.usePcList.get(0).useTime;
			}
			if(obj == pc3){	
				System.out.println("작동 박현경번 버튼");
			}
			if(obj == pc4){	
				System.out.println("작동 이진우번 버튼");
			}
			if(obj == pc5){	
				
			}
			if(obj == pc6){	
				
			}
			if(obj == pc7){	
				
			}
			pcViewR = new PcViewRun();
			pcViewTh = new Thread(pcViewR); 
			pcViewTh.start();
			
			try {
				pcViewTh.sleep(500);
			} catch (InterruptedException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
		}
	}
	
	public void judgeUsePc(){
		itr = pcList.usePcList.iterator();
		for(int i =0;itr.hasNext();i++){
			if(pcList.usePcList != null){
				
			}
			itr.next();
		}
		
	}
		
	class MyPanel extends JPanel{
		public void paint(Graphics g){
			g.drawImage(BGimg, 0, 0, null);
		}
	}   
	
	class PcViewRun implements Runnable{

		public void run() {
			while(true){
				saveUsingPCstr 	 = clickedUpc.user.getName();
				saveStartTimestr = clickedUpc.startTime;
				saveUsingTimestr = clickedUpc.useTime;
				saveusingFeestr  = clickedUpc.useFee;
				usingPCLabel.setText(saveUsingPCstr);
				startTimeLabel.setText(saveStartTimestr);
				usingTimeLabel.setText(saveUsingTimestr);
				usingFeeLabel.setText(saveusingFeestr + "원");
			}
		}
	}
}
