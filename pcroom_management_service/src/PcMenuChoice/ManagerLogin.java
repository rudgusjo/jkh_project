package PcMenuChoice;

import java.awt.Dialog;
import java.awt.Graphics;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.sql.SQLException;

import javax.imageio.ImageIO;
import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JTextField;

public class ManagerLogin extends LoginConsole{
	JFrame mLoginFrame = new JFrame(); 
	ButtonHandler bHandler;
	UseDB db;
	IdInfo idI;
	UsePC uPC ;
	ManagerConsole mc ;
	PCListManagement pcList;
	
	public ManagerLogin(PCListManagement pcList){	
		this.pcList = pcList;
		mLoginFrame.setTitle("������ �α���");
		mLoginFrame.setSize(PCROOM.width,PCROOM.height);
		mLoginFrame.setLayout(null);
		mLoginFrame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
		bHandler = new ButtonHandler();
		
		try{
			BGimg = ImageIO.read(new File("img/background.jpg"));
		}catch(IOException e){
			System.out.println("�̹��� �ҷ����� ����!");
			System.exit(0);
		}

		//���ι���
		ModeText = new JLabel("====�����ڸ��====");
		ModeText.setBounds(265, 180, 230, 30);
		ModeText.setFont(PCROOM.useFont);
		
		//�α��� ��
		loginLabel = new JLabel("ID�Է�:");
		loginLabel.setLocation(300, 225);
		loginLabel.setSize(80, 80);
		//�н����� ��
		passwdLabel = new JLabel("Pass�Է�:");
		passwdLabel.setLocation(282, 265);
		passwdLabel.setSize(80, 80);
		
		//�α���,�н����� �ʵ�
		loginField = new JTextField(15);	//(15)�� �����ִ��
		loginField.setBounds(350, 250, 100, 30);
		passwdField = new JPasswordField(30);	//(30)�� �����ִ��
		passwdField.setBounds(350, 290, 100, 30);
		 
		//Ȯ�ι�ư
		confirmBT = new JButton("�α���");
		confirmBT.setBounds(320, 370, 100, 30);
		confirmBT.addActionListener(bHandler);

		mLoginFrame.add(ModeText);
		mLoginFrame.add(loginLabel);
		mLoginFrame.add(passwdLabel);
		mLoginFrame.add(loginField);
		mLoginFrame.add(passwdField);
		mLoginFrame.add(confirmBT);

		//�̹��� �г� ����
		MyPanel mp = new MyPanel();
		mp.setBounds(0, 0, PCROOM.width, PCROOM.height);
		mLoginFrame.add(mp);
				
		mLoginFrame.setVisible(true);
	}
	
	class ButtonHandler implements ActionListener{	//UserLogin�� ��� ��ư �׼�

		public void actionPerformed(ActionEvent e) {
			Object obj = e.getSource();
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
					&& idI.judgeAthority == 1){
					
					uPC = new UsePC(idI);
					mc = new ManagerConsole(pcList);
					mLoginFrame.setVisible(false);
				}else{
					LoginMiss LM = new LoginMiss(mLoginFrame);
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
