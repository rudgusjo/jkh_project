package com.aims.application;

import android.Manifest;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.widget.CompoundButton;
import android.widget.Switch;
import android.widget.TextView;

import com.aims.R;

import org.altbeacon.beacon.Beacon;

import java.util.List;
import java.util.UUID;

/**
 * Created by illil on 2017-03-23.
 */

public class BeaconActivity extends AppCompatActivity implements CompoundButton.OnCheckedChangeListener {

    TextView textView;

    //bluetooth 권한 얻기 위함
    static final int MY_PERMISSIONS_REQUEST_BLUETOOTH = 1;
    static final int MY_PERMISSIONS_REQUEST_BLUETOOTH_ADMIN = 2;
    static final int MY_PERMISSIONS_REQUEST_ACCESS_COARSE_LOCATION = 3;
    //static final int MY_PERMISSIONS_REQUEST_CAMERA = 4;
    Switch beacon_switch;

    SharedPreferences sp;
    SharedPreferences.Editor editor;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.beacon_main);

        //switch 버튼 상태 확인
        beacon_switch = (Switch)findViewById(R.id.beacon_switch) ;
        beacon_switch.setOnCheckedChangeListener(this);

        //SharedPreference 에서 beacon flag값 가져옴
        sp = getSharedPreferences("AIMS",0);
        editor = sp.edit();

        boolean beaconflag = sp.getBoolean("beaconFlag",false);  //없으면 default => false

        if(beaconflag){
            beacon_switch.setChecked(true);
        }else{
            beacon_switch.setChecked(false);
        }


        //권한 체크
        permissionCheck();


    }

    // CompoundButton.OnCheckedChangeListner
    @Override
    public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {

        if(isChecked){
            //SharedPreference 에 값 setting
            editor.putBoolean("beaconFlag",true);
            editor.commit();

            //service 실행
            startService(new Intent(BeaconActivity.this,BeaconService.class));
            handler.sendEmptyMessageDelayed(0, 1000);

        }else{
            editor.putBoolean("beaconFlag",false);
            editor.commit();

            stopService(new Intent(BeaconActivity.this,BeaconService.class));
            handler.removeMessages(0);
        }

    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
    }


    Handler handler = new Handler() {
        public void handleMessage(Message msg) {

            BeaconApplication app = (BeaconApplication)getApplication();
            List<Beacon> beaconList = app.getBeaconList();
            textView = (TextView) findViewById(R.id.Textview);

            if( textView != null && beaconList != null && beaconList.size() > 0 ){

                //view 초기화
                textView.setText("");

                for (Beacon beacon : beaconList) {

                    Log.d("debug","확인 3");
                    textView.append("getId1 : " + beacon.getId1() + "\n" +
                            "getId2 : " + beacon.getId2() + "\n" +
                            "getId3 : " + beacon.getId3() + "\n" +
                            "rssi : " + beacon.getRssi() + "\n" +
                            "Txpower : " + beacon.getTxPower() + "\n" +
                            "Distance : " + Double.parseDouble(String.format("%.3f", beacon.getDistance())) + "\n");

                }
            }

            // 자기 자신을 n초마다 호출
            handler.sendEmptyMessageDelayed(0, 1000);
        }
    };

    public void getDeviceUUID() {
        UUID uuid = null;
    }

    //api level 23 (마시멜로 이상) 은 앱실행시 권한 허가가 필요함.
    // 이전버전은 앱 다운로드시 한번만 하면됨.
    public void permissionCheck() {

        //권한이 없을 경우
        if (ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {

            //최초 권한 요청인가, 사용자에 의한 권한 재요청인가
            if (ActivityCompat.shouldShowRequestPermissionRationale(this, Manifest.permission.ACCESS_COARSE_LOCATION)) {
                Log.d("permission debug","권한 재요청");
                //권한 재요청
                ActivityCompat.requestPermissions(this,
                        new String[]{Manifest.permission.ACCESS_COARSE_LOCATION},
                        MY_PERMISSIONS_REQUEST_ACCESS_COARSE_LOCATION);

            }else {
                //최초 권한 요청 경우 경우
                Log.d("permission debug","최초 권한 요청");

                ActivityCompat.requestPermissions(this,
                        new String[]{Manifest.permission.ACCESS_COARSE_LOCATION},
                        MY_PERMISSIONS_REQUEST_ACCESS_COARSE_LOCATION);
            }

        } else{
            Log.d("debug","난뭐지??");

        }
    }


    @Override
    public void onRequestPermissionsResult(int requestCode, String[] permissions, int[] grantResults) {
        Log.d("permission debug","onRequestPermissionResult들어옴");
        switch(requestCode){
            case MY_PERMISSIONS_REQUEST_ACCESS_COARSE_LOCATION:

                if(grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED){
                    Log.d("permission debug","true");

                }else{
                    Log.d("permission debug","false");
                }
                return;
        }

    }
}
