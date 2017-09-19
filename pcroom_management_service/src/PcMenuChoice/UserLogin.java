package PcMenuChoice;

import java.awt.Graphics;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;
import java.io.IOException;
import java.sql.SQLException;
import java.util.Iterator;

import javax.imageio.ImageIO;
import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JTextField;

public class UserLogin extends LoginConsole{
	JFrame uLoginFrame = new JFrame(); 
	ButtonHandler bHandler;
	JLabel pcSelect;
	UseDB db;
	JComboBox pclistCB;	
	IdInfo idI;
	UsePC uPC ;
	Iterator itr;
	PCListManagement pcList;
	
	public UserLogin(PCListManagement pcList){		
		this.pcList = pcList;
		uLoginFrame.setTitle("����� �α���");
		uLoginFrame.setSize(PCROOM.width,PCROOM.height);
		uLoginFrame.setLayout(null);
		uLoginFrame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
		bHandler = new ButtonHandler();
		
		pclistCB = new JComboBox(this.pcList.PcListDB);
		
		try{
			BGimg = ImageIO.read(new File("img/background.jpg"));
		}catch(IOException e){
			System.out.println("�̹��� �ҷ����� ����!");
			System.exit(0);
		}

		//=============��� ������ư ���� ���� =============
		
		ModeText = new JLabel("====����ڸ��====");
		ModeText.setBounds(275, 180, 200, 30);
		ModeText.setFont(PCROOM.useFont);
		
		loginLabel = new JLabel("ID�Է�:");
		loginLabel.setLocation(300, 225);
		loginLabel.setSize(80, 80);
		passwdLabel = new JLabel("Pass�Է�:");
		passwdLabel.setLocation(282, 265);
		passwdLabel.setSize(80, 80);
		
		
		loginField = new JTextField(15);	//(15)�� �����ִ��
		loginField.setBounds(350, 250, 100, 30);
		passwdField = new JPasswordField(30);	//(30)�� �����ִ��
		passwdField.setBounds(350, 290, 100, 30);
		
		pcSelect = new JLabel("pc����:");
		pcSelect.setLocation(297, 302);
		pcSelect.setSize(80, 80);
		pclistCB.setBounds(350, 330, 60, 25);

		 
		confirmBT = new JButton("�α���");
		confirmBT.setBounds(320, 400, 100, 30);
		confirmBT.addActionListener(bHandler);
		
		//��� ������Ʈ �����ӿ� �߰�
		uLoginFrame.add(loginLabel);
		uLoginFrame.add(passwdLabel);
		uLoginFrame.add(loginField);
		uLoginFrame.add(passwdField);
		uLoginFrame.add(pcSelect);
		uLoginFrame.add(pclistCB);
		uLoginFrame.add(confirmBT);
		uLoginFrame.add(ModeText);
		
		//�̹��� �г� ����
		MyPanel mp = new MyPanel();
		mp.setBounds(0, 0, PCROOM.width, PCROOM.height);
		uLoginFrame.add(mp);
				
		uLoginFrame.setVisible(true);
	}

	//====UserLogin�� ��� ��ư �׼�====
	class ButtonHandler implements ActionListener{	

		public void actionPerformed(ActionEvent e) {
			Object obj = e.getSource();
			itr = pcList.usePcList.iterator();
			boolean judgeUseID = true;
			//���� ���� �ҷ�����
			db = new UseDB();
			idI = new IdInfo(); 
			try {
				idI.setUserInfoDB(db,loginField.getText());
				idI.ViewInfo();
			} catch (SQLException e1) {
				System.out.println("�������� �������");
			}
			if(obj == confirmBT){	//�α��� ��ư Ŭ����
				
				if(	idI.getId().equals(loginField.getText()) 
					&& idI.getPw().equals(passwdField.getText()) 
					&& idI.judgeAthority == 2){
					for(int i =0;itr.hasNext();i++){
						itr.next();
						if(pcList.usePcList.get(i).user.getId().equals(loginField.getText())){
							judgeUseID = false;
						}
						else{
							judgeUseID = true;
						}
					}		
					if(judgeUseID == false){
						UsedID usedID = new UsedID(uLoginFrame);
					}else{
						uPC = new UsePC(idI);
						uPC.pcName = (String)pclistCB.getSelectedItem();
						pcList.setUsePcList(uPC);
						UConsole uc = new UConsole(uPC,pcList);						
						uLoginFrame.setVisible(false);
					}	
				}else{
					LoginMiss LM = new LoginMiss(uLoginFrame);
				}
			}
		}
	}
	
	class MyPanel extends JPanel{
		public void paint(Graphics g){
			g.drawImage(BGimg, 0, 0, null);
		}
	}
}
