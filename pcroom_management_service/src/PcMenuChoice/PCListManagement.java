package PcMenuChoice;

import java.awt.List;
import java.sql.SQLException;
import java.util.ArrayList;

public class PCListManagement {
	ArrayList <UsePC> usePcList = new ArrayList();
	String[] PcListDB = new String[50];;
	UseDB DB ;
	
	PCListManagement(){
		DB = new UseDB();
		pcTableSelect();
	}

	public void setUsePcList(UsePC uPC){
		this.usePcList.add(uPC);
	}
	
	public void pcTableSelect(){
		String sentence = "select * from pclist";
		try {
			DB.setResultQuery(sentence);
		} catch (SQLException e) {
			System.out.println("테이블 선택 오류");
		}

			try {
				for(int i = 0;DB.result.next();i++){
					try {
						this.PcListDB[i] = DB.result.getString("pcName");
						System.out.println(this.PcListDB[i]);
					} catch (SQLException e) {
						// TODO Auto-generated catch block
						System.out.println("pclist input error");
						e.printStackTrace();
					}
				}
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
	}
}
