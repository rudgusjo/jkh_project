package PcMenuChoice;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Connection;

public class IdInfo {
	
	private String id; 
	private String pw;
	private String personalNum;
	private String name;
	private String gender;
	private String phoneNum;
	private String email;
	public String pcInfo;
	public String useTime;
	public int judgeAthority;
	
	public String getId() {
		return id;
	}
	public String getPw() {
		return pw;
	}
	
	public void setId(String id) {
		this.id = id;
	}
	public void setPw(String pw) {
		this.pw = pw;
	}
	
	public void setPersonalNum(String personalNum) {
		this.personalNum = personalNum;
	}
	public String getPersonalNum() {
		return this.personalNum;
	}
	
	public void setName(String Name) {
		this.name = Name;
	}
	public String getName() {
		return this.name;
	}
	
	public void setGender(String gender) {
		this.gender = gender;
	}
	public String getGender() {
		return this.gender;
	}
	
	public void setPhoneNum(String phoneNum) {
		this.phoneNum = phoneNum;
	}
	public String getPhoneNum() {
		return this.phoneNum;
	}
	
	public void setEmail(String email) {
		this.email = email;
	}
	public String getEmail() {
		return this.email;
	}
	
	public void ViewInfo() {

		System.out.println(this.id);
		System.out.println(this.pw);
		System.out.println(this.personalNum);
		System.out.println(this.name);
		System.out.println(this.gender);
		System.out.println(this.phoneNum);
		System.out.println(this.email);
		System.out.println(this.pcInfo);
		System.out.println(this.judgeAthority);
	}
	
	
/*	public void judgeNull(String target){
		if(){
			
		}
	}*/
	public void setUserInfoDB(UseDB db,String targetId) throws SQLException{
		String sqlSentence = "select * from idInfo where id = '" + targetId + "';";
		db.setResultQuery(sqlSentence);
		
		while(db.result.next()){
			this.id = db.result.getString(1);
			this.pw = db.result.getString(2);
			this.personalNum = db.result.getString(3);
			this.name = db.result.getString(4);
			this.gender = db.result.getString(5);
			this.phoneNum = db.result.getString(6);
			this.email = db.result.getString(7);
			this.judgeAthority = new Integer(db.result.getString(8));
		}
	}

}
