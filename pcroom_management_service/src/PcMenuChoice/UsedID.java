package PcMenuChoice;

import java.awt.Dialog;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;

import PcMenuChoice.LoginMiss.ButtonHandler;

public class UsedID {
	Dialog loginMiss;
	JLabel missedText;
	JButton cancleBT;
	ButtonHandler bHandler;
	
	public UsedID(JFrame f){
		bHandler = new ButtonHandler();
		loginMiss = new Dialog(f,"로그인 확인창",true);
		loginMiss.setLayout(null);
		loginMiss.setSize(300, 150);
		missedText = new JLabel("이미 사용중인 아이디 입니다");
		missedText.setBounds(35,60,250,50);
		cancleBT = new JButton("취소");
		cancleBT.setBounds(115,105,60,20);
		cancleBT.addActionListener(bHandler);
		
		loginMiss.add(missedText);
		loginMiss.add(cancleBT);
		loginMiss.setVisible(true);
	}
	
	class ButtonHandler implements ActionListener{	//취소 버튼 액션

		public void actionPerformed(ActionEvent e) {
			Object obj = e.getSource();
			//취소 버튼 클릭시
			if(obj == cancleBT){loginMiss.setVisible(false);}
		}
	}
}
