package com.aims.application;

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.Bundle;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;

import com.aims.R;

import java.util.UUID;


public class MainActivity extends AppCompatActivity{


    //bluetooth 권한 얻기 위함
    static final int MY_PERMISSIONS_REQUEST_BLUETOOTH = 1;
    static final int MY_PERMISSIONS_REQUEST_BLUETOOTH_ADMIN = 2;
    static final int MY_PERMISSIONS_REQUEST_ACCESS_COARSE_LOCATION = 3;
    //static final int MY_PERMISSIONS_REQUEST_CAMERA = 4;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //권한 체크

        //login 버튼
        Button login_btn = (Button)findViewById(R.id.login);
        login_btn.setOnClickListener(
                new View.OnClickListener(){
                    @Override
                    public void onClick(View v) {   //버튼이 눌려졌을 때
                        Intent intent = new Intent(MainActivity.this, LoginActivity.class);
                        startActivity(intent);
                    }
        });
        //join 버튼
        Button join_btn = (Button)findViewById(R.id.join);
        join_btn.setOnClickListener(
                new View.OnClickListener(){
                    @Override
                    public void onClick(View v) {   //버튼이 눌려졌을 때
                        Intent intent = new Intent(MainActivity.this, JoinActivity.class);
                        startActivity(intent);
                    }
                });
        //beacon 설정 버튼
        Button beacon_set_btn = (Button)findViewById(R.id.beacon);
        beacon_set_btn.setOnClickListener(
                new View.OnClickListener(){
                    @Override
                    public void onClick(View v) {   //버튼이 눌려졌을 때
                        Intent intent = new Intent(MainActivity.this, BeaconActivity.class);
                        startActivity(intent);
                    }
                });

    }






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

