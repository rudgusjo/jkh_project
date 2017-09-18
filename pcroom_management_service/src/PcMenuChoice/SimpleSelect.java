package PcMenuChoice;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;

public class SimpleSelect {
	JFrame myFrame;
	JPanel myPanel;
	JButton userModeBT;
	JButton managerModeBT;
	ButtonHandler bHandler;
	PCListManagement pcList;
	UserLogin uLogin;
	ManagerLogin mLogin;
	boolean createdObj = false;
	
	SimpleSelect(PCListManagement pcList){
		
		this.mLogin = mLogin;
		this.pcList = pcList;
		myFrame = new JFrame();
		myFrame.setLocation(800, 200);
		myFrame.setLayout(null);
		myFrame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
		myFrame.setSize(200, 100);
		
		bHandler = new ButtonHandler();
		
		userModeBT = new JButton("유저모드");
		userModeBT.setLocation(0, 0);
		userModeBT.setSize(95, 100);
		myFrame.add(userModeBT);
		
		managerModeBT = new JButton("관리자모드");
		managerModeBT.setLocation(95, 0);
		managerModeBT.setSize(95, 100);
		myFrame.add(managerModeBT);
		
		userModeBT.addActionListener(bHandler);
	    managerModeBT.addActionListener(bHandler);
		
	    myFrame.setVisible(true);
	}
	SimpleSelect(PCListManagement pcList, UserLogin uLogin){
		this(pcList);
		this.uLogin = uLogin;
	}
	SimpleSelect(PCListManagement pcList, ManagerLogin mLogin){
		this(pcList);
		this.mLogin = mLogin;
	}
	
	
	class ButtonHandler implements ActionListener{

		@Override
		public void actionPerformed(ActionEvent e) {
			Object obj = e.getSource();
		
			if(obj == userModeBT){
				if(createdObj == false){
					uLogin = new UserLogin(pcList);
					createdObj = true;
				}
				uLogin.uLoginFrame.setVisible(true);
			}
			else if(obj == managerModeBT){
				if(createdObj == false){
					mLogin = new ManagerLogin(pcList);
					createdObj = true;
				}
				mLogin.mLoginFrame.setVisible(true);
			}
		}
	}
}
