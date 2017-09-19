package com.aims.application;

import android.app.Application;

import org.altbeacon.beacon.Beacon;

import java.util.ArrayList;
import java.util.Collection;
import java.util.List;

/**
 * Created by illil on 2017-09-01.
 */

public class BeaconApplication extends Application {

    private BeaconActivity beaconActivity;
    protected List<Beacon> beaconList = new ArrayList<>();


    public BeaconActivity getBeaconActivity() {
        return beaconActivity;
    }

    public void setBeaconActivity(BeaconActivity beaconActivity) {
        this.beaconActivity = beaconActivity;
    }

    public void setBeaconList(Collection<Beacon> beacons){

        beaconList.clear();
        for (Beacon beacon : beacons) {
            beaconList.add(beacon);
        }

    }

    public List<Beacon> getBeaconList(){
        return beaconList;
    }

}
