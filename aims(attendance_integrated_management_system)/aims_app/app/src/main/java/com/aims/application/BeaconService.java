package com.aims.application;

import android.app.Service;
import android.content.Intent;
import android.os.IBinder;
import android.os.RemoteException;
import android.util.Log;

import org.altbeacon.beacon.Beacon;
import org.altbeacon.beacon.BeaconConsumer;
import org.altbeacon.beacon.BeaconManager;
import org.altbeacon.beacon.BeaconParser;
import org.altbeacon.beacon.RangeNotifier;
import org.altbeacon.beacon.Region;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.Collection;
import java.util.List;

public class BeaconService extends Service implements BeaconConsumer{


        private BeaconManager beaconManager;

        public BeaconService() {
        }

        @Override
        public IBinder onBind(Intent intent) {
            // TODO: Return the communication channel to the service.
            // Service 객체와 Activity 사이에서 통신을 주고받을때 사용하는 메서드
            // 데이터를 넘길필요가 없으면 return null

    //        throw new UnsupportedOperationException("Not yet implemented");

            return null;

        }
        @Override
        public void onCreate(){
            //가장 먼저 호출, 최초 한번 실행
            Log.d("B_Service debug","onCreate실행");
        }
        @Override
        public int onStartCommand(Intent intent, int flags, int startld){
            //서비스가 호출될때마다 실행됨
            Log.d("B_Service debug","onStartCommand실행");

            if(beaconManager == null) {

                // 실제로 비콘을 탐지하기 위한 비콘매니저 객체를 초기화
                beaconManager = BeaconManager.getInstanceForApplication(this);

                //기기에 따라서 setBeaconLayout 안의 내용을 바꿔줘야 함
                beaconManager.getBeaconParsers().add(new BeaconParser().setBeaconLayout("m:2-3=0215,i:4-19,i:20-21,i:22-23,p:24-24,d:25-25"));

                // 비콘 탐지 시작
                beaconManager.bind(this);

            }

            return START_STICKY;
        }

        @Override
        public void onDestroy(){
            //서비스 종료 시 실행
            Log.d("B_Service debug","onDestroy실행");
            beaconManager.unbind(this);
        }

        public void onBeaconServiceConnect() {

            final BeaconApplication app = (BeaconApplication)getApplication();

            beaconManager.setRangeNotifier(new RangeNotifier() {
                @Override
                // 비콘이 감지되면 해당 함수가 호출된다. Collection<Beacon> beacons에는 감지된 비콘의 리스트가,
                // region에는 비콘들에 대응하는 Region 객체가 들어온다.
                public void didRangeBeaconsInRegion(Collection<Beacon> beacons, Region region) {

                    if (beacons.size() > 0) {
                        app.setBeaconList(beacons);

                        List<Beacon> beaconList = app.getBeaconList();

                        JSONObject jsonObject;

                        for (Beacon beacon : beaconList) {

                            jsonObject = new JSONObject();

                            try {
                                jsonObject.put("UUID",beacon.getId1());
                                jsonObject.put("major", beacon.getId2());
                                jsonObject.put("minor", beacon.getId3());
                                jsonObject.put("Distance", Double.parseDouble(String.format("%.3f", beacon.getDistance())));
                                jsonObject.put("identifier", "leeseunghyun");

                            } catch (JSONException e) {
                                e.printStackTrace();
                            }

                            //http통신을 위한 객체 생성
                            //Json 객체 생성
                            Httpinfosend httpsend = new Httpinfosend();
                            httpsend.setJson(jsonObject);
                            httpsend.execute();

                        }

                    }
                }

            });

            try {
                beaconManager.startRangingBeaconsInRegion(new Region("myRangingUniqueId", null, null, null));
            } catch (RemoteException e) {
            }
        }
}
