package PcMenuChoice;

public class TimeManagement {

	String time;
	TimeRun runrun;
	long startTime;
	boolean useEnd;
	
	TimeManagement(TimeRun tr) throws InterruptedException{

		startTime = System.nanoTime();
		useEnd = true;
		runrun = tr;
	}

}
