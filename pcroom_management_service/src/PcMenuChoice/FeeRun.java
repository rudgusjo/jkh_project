package PcMenuChoice;

public class FeeRun implements Runnable {

	TimeRun tr;
	int intFee;
	String useStringFee = "1200";
	UsePC usePC;
	
	FeeRun(TimeRun tr,UsePC usePC){
		this.tr = tr;
		this.usePC = usePC;
	}
	
	public void run() {
		while(true){
			try {
				Thread.sleep(1000);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			if(tr.hour<1)							{this.intFee = 1200;}
			else if(tr.hour>=1 && tr.minute%10==0)	{this.intFee +=200;}
			
			useStringFee = String.format("%04d", this.intFee);
			usePC.useFee = useStringFee;
		}
	}
}
