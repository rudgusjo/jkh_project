package PcMenuChoice;

public class UsePC{
	String pcName;
	String useJudge = "사용중";
	String useTime;
	String useFee;
	IdInfo user;
	String startTime = new java.text.SimpleDateFormat("HH:mm:ss").format(new java.util.Date());
	long countTime;
	boolean useEndJudge = true;
	TimeRun timeR;
	Thread timeTh;
	FeeRun FeeR;
	Thread FeeTh;

	UsePC(){
	}

	UsePC(IdInfo ui){
		this.user = ui;
		countTime = System.nanoTime();
		timeR = new TimeRun(countTime,useEndJudge,this);
		timeTh = new Thread(timeR);
		timeTh.start();
		
		try {
			timeTh.sleep(1000);
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			System.out.println("쓰레드 슬립 오류");
		}
		
		FeeR = new FeeRun(timeR,this);
		FeeTh = new Thread(FeeR);
		FeeTh.start();
	}
}
