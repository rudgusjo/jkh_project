package PcMenuChoice;


import java.awt.Graphics;
import java.awt.event.*;

import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;

public class UMSelect extends JFrame{

	JFrame myFrame;
	JPanel myPanel;
	JButton userModeBT;
	JButton managerModeBT;
	PCListManagement pcList;
	
	public UMSelect(){
		this.pcList = new PCListManagement();
		myFrame = new JFrame();
		myFrame.setLayout(null);
		myFrame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
		myFrame.setSize(PCROOM.width, PCROOM.height);
		
		userModeBT = new JButton(){ImageIcon i = new ImageIcon("img/UserMode.jpg");
    	public void paintComponent(Graphics g) {
    		g.drawImage(i.getImage(), 0, 0, 400, 600, null);
	    	}
	    };
	    userModeBT.setBounds(0,0,400, 600);

	    managerModeBT = new JButton(){ImageIcon i = new ImageIcon("img/ManagerMode.jpg");
    	public void paintComponent(Graphics g) {
    		g.drawImage(i.getImage(), 0, 0, 400, 600, null);
	    	}
	    };
	    managerModeBT.setBounds(400,0,400, 600);
	    
	    ButtonHandler bh = new ButtonHandler();
	    
	    userModeBT.addActionListener(bh);
	    managerModeBT.addActionListener(bh);
	    
	    myFrame.getContentPane().add("UserMode", userModeBT);
	    myFrame.getContentPane().add("UserMode", managerModeBT);
	    
	    myFrame.setVisible(true);
	}
	
	class ButtonHandler implements ActionListener{

		@Override
		public void actionPerformed(ActionEvent e) {
			Object obj = e.getSource();
		
			if(obj == userModeBT){
				UserLogin userLogin = new UserLogin(pcList);
				SimpleSelect sSelect = new SimpleSelect(pcList,userLogin);
				myFrame.setVisible(false);
			}
			else if(obj == managerModeBT){
				ManagerLogin managerLogin = new ManagerLogin(pcList);
				SimpleSelect sSelect = new SimpleSelect(pcList,managerLogin);
				myFrame.setVisible(false);
			}
		}
	}
}