package PcMenuChoice;

class TimeRun implements Runnable{

	long sTime;
	long countTime;
	boolean useEnd;
	long hour;
	long minute;
	long second;
	String allTime ="00:00:00";
	String setTime;
	UsePC usePC;

	TimeRun(long st, boolean useEnd, UsePC usePC){
		this.sTime = st;
		this.useEnd = useEnd;
		this.usePC = usePC;
	}

	@Override
	public void run() {
		while(this.useEnd){
			countTime = System.nanoTime();
			second = (countTime - sTime)/1000000000;
			if(second==60){
				this.sTime = System.nanoTime();
				second = 0;
				minute++;
			}
			if(minute==60){
				minute = 0;
				hour++;
			}
			
			if((countTime - sTime)%1000000000 == 0){
				allTime = String.format("%02d", hour) + ":" + String.format("%02d", minute) + ":" + String.format("%02d", second);
				usePC.useTime = allTime;
			}
		}
	}
}