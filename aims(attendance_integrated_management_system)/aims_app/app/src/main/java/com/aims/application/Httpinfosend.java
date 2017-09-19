package com.aims.application;

        import android.os.AsyncTask;
        import android.util.Log;

        import org.json.JSONObject;

        import java.io.BufferedReader;
        import java.io.IOException;
        import java.io.InputStream;
        import java.io.InputStreamReader;
        import java.io.OutputStream;
        import java.net.HttpURLConnection;
        import java.net.MalformedURLException;
        import java.net.ProtocolException;
        import java.net.URL;


public class Httpinfosend extends AsyncTask<Void, Void, Void> {

    private URL Url;
    private String strUrl,strCookie,result,param;
    JSONObject json;

    //기본 세팅
    @Override
    protected void onPreExecute() {
        super.onPreExecute();
        //"http://112.165.72.190/php/study/androidhttp/test.php"
        //"http://112.165.72.190:80"

//        strUrl = "http://112.165.72.190";
        strUrl = "http://52.79.192.251:3000/data";
        param = "data=test";

        Log.e("http_debug","onpreExecute");

    }

    protected void setJson(JSONObject jsonobject){
        json = jsonobject;
    }

    @Override
    protected Void doInBackground(Void... voids) {
        Log.e("http_debug","doInBackground 0");
        try{
            Log.e("http_debug","doInBackground 1");

            Url = new URL(strUrl); // URL화 한다.
            HttpURLConnection conn = (HttpURLConnection) Url.openConnection(); // URL을 연결한 객체 생성.
            conn.setRequestMethod("POST"); // 통신 방식
            conn.setDoOutput(true); // 서버로 데이터를 전송할 수 있게함
            conn.setDoInput(true); // 서버로 부터 데이터를 받을 수 있도록 함

            /*
            conn.setUseCaches(false); // 캐싱데이터를 받을지 안받을지
            conn.setDefaultUseCaches(false); // 캐싱데이터 디폴트 값 설정
            strCookie = conn.getHeaderField("Set-Cookie"); //쿠키데이터 보관
            */

            Log.e("http_debug","doInBackground 2");

            OutputStream os = conn.getOutputStream(); //output스트림 개방
            os.write(json.toString().getBytes());     //조사

//            os.write(param.getBytes());

            os.flush();     //조사
            os.close();     //조사


            Log.e("http_debug","doInBackground 3");

            InputStream is = conn.getInputStream(); //input스트림 개방

            StringBuilder builder = new StringBuilder(); //문자열을 담기 위한 객체
            BufferedReader reader = new BufferedReader(new InputStreamReader(is,"UTF-8")); //문자열 셋 세팅
            String line;

            while ((line = reader.readLine()) != null) {
                builder.append(line+ "\n");
            }

            result = builder.toString();



        }catch(MalformedURLException | ProtocolException exception) {
            exception.printStackTrace();
        }catch(IOException io){
            io.printStackTrace();
        }
        return null;
    }

    //doinbackground다음 실행됨
    @Override
    protected void onPostExecute(Void aVoid) {
        super.onPostExecute(aVoid);
//        System.out.println(result);
        Log.e("http_debug","데이터 전송");
    }

}



