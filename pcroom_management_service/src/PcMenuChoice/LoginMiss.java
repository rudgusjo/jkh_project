package PcMenuChoice;

import java.awt.Dialog;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;

import PcMenuChoice.ManagerLogin.ButtonHandler;

public class LoginMiss {
	Dialog loginMiss;
	JLabel missedText;
	JButton cancleBT;
	ButtonHandler bHandler;
	
	public LoginMiss(JFrame f){
		bHandler = new ButtonHandler();
		loginMiss = new Dialog(f,"�α��� Ȯ��â",true);
		loginMiss.setLayout(null);
		loginMiss.setSize(300, 150);
		missedText = new JLabel("���̵� Ȥ�� ��й�ȣ�� ���� �ʽ��ϴ�");
		missedText.setBounds(35,60,250,50);
		cancleBT = new JButton("���");
		cancleBT.setBounds(115,105,60,20);
		cancleBT.addActionListener(bHandler);
		
		loginMiss.add(missedText);
		loginMiss.add(cancleBT);
		loginMiss.setVisible(true);
	}
	
	class ButtonHandler implements ActionListener{	//��� ��ư �׼�

		public void actionPerformed(ActionEvent e) {
			Object obj = e.getSource();
			//��� ��ư Ŭ����
			if(obj == cancleBT){loginMiss.setVisible(false);}
		}
	}
}
