package PcMenuChoice;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class UseDB {
	public String id;
	public String passwd;
	Statement stmt;
	Connection con;
	String driverName;
	String DBName;
	String dbURL; // URL ����
	String SQL;
	ResultSet result;
	
	public UseDB(){
		try{
			String driverName = "org.gjt.mm.mysql.Driver"; // ����̹� �̸� ����
			String DBName = "pcroom";
			String dbURL = "jdbc:mysql://localhost:3309/" + DBName; // URL ����
			/*String SQL = "select * from USERINFO;";*/
			
			
			Class.forName(driverName); // ����̹� �ε�
			this.con  = DriverManager.getConnection(dbURL,"root","root1234"); // ���� 

			this.stmt = con.createStatement();
			
			this.stmt.executeUpdate("USE PCROOM");
			
		}catch(Exception e){
			System.out.println("Mysql Server Not Connection.");
			e.printStackTrace();
		}
	}
	
	public void setResultQuery(String sentence) throws SQLException{
		this.SQL = sentence;
		this.result = this.stmt.executeQuery(this.SQL);
	}
}





/*package ������;

import java.sql.*;

public class dbdb {
	public static void main(String[] args){
		
		try{
			String driverName = "org.gjt.mm.mysql.Driver"; // ����̹� �̸� ����
			String DBName = "mysql";
			String dbURL = "jdbc:mysql://localhost:3309/" + DBName; // URL ����
			String SQL = "select * from student;";
			String sqlCT = "CREATE TABLE STUDENT (" +
					"id varchar(20) NOT NULL, " +
					"name varchar(20) NOT NULL, " +
					"snum int NOT NULL, " +
					"dept varchar(20) NOT NULL, " +
					"PRIMARY KEY(id) " +
					");";
			
			Class.forName(driverName); // ����̹� �ε�
			Connection con  = DriverManager.getConnection(dbURL,"root","root1234"); // ���� 
			System.out.println("Mysql DB Connection.");

			Statement stmt = con.createStatement();
			
			stmt.executeUpdate("CREATE DATABASE mysql");
			System.out.println("������ ���̽��� mydb�� �����Ǿ����ϴ�.");
			stmt.executeUpdate(sqlCT);
			System.out.println("Table Created");
			
			
			//data Insert
			stmt.executeUpdate("insert into STUDENT values('01','Noon',20100909,'Security');");
			stmt.executeUpdate("insert into STUDENT values('02','Bom',20100909,'IT');");
			stmt.executeUpdate("insert into STUDENT values('03','Rye',20100909,'Devel');");
			stmt.executeUpdate("insert into STUDENT values('04','Kim',20100909,'Random');");
			System.out.println("Insert Data");

			stmt.executeQuery(SQL);
			ResultSet result = stmt.executeQuery(SQL);
			
			while(result.next()){
				System.out.print(result.getString(1)+"\t");
				System.out.print(result.getString(2)+"\t");
				System.out.print(result.getString(3)+"\t");
				System.out.print(result.getString(4)+"\n");
			}
			con.close();
		}catch(Exception e){
			
			System.out.println("Mysql Server Not Connection.");
			e.printStackTrace();
		}
	}
}*/

