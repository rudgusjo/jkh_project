var express 	= require('express');
var path 		= require('path');
var logger 		= require('morgan');
var bodyParser 	= require('body-parser');
var ejsLocals 	= require('ejs-locals');
var session		= require('express-session');

//메인 페이지 관련 라우트
var index_route = require('./app_server/routes/index_route');
//로그인 관련 라우트
// var login_route = require('./app_server/routes/login_route');
//웹 회원 관련 관련 라우트
var sign_route = require('./app_server/routes/sign_route');
//앱 회원 관련 관련 라우트
var app_sign_route = require('./app_server/routes/app_sign_route');
//출석 정보 관련 라우트
var attendance_route = require('./app_server/routes/attendance_route');
//앱 송신정보 획득 라우트
var beaconData_route = require('./app_server/routes/beaconData_route');

//이동 정보 관련 라우트
var movement_route = require('./app_server/routes/movement_route');

var app = express();

app.set('views',path.join(__dirname,'app_server','views'));
app.set('view engine','ejs');
//로그출력
app.use(logger('dev'));

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(express.static(path.join(__dirname,'public')));
app.engine('ejs',ejsLocals);
app.use(session({
  secret: 'keyboard cat',
  resave: false,
  saveUninitialized: true

}));
//메인 페이지 관련 라우팅
app.use('/',index_route);
//로그인 관련 라우팅
// app.use('/login',login_route);
// // 로그인 관련 라우팅
// app.use('/signup',signup_route);
// // 출석 정보 관련 라우팅
app.use('/sign',sign_route);
// // 출석 정보 관련 라우팅
app.use('/appSign',app_sign_route);
//출석 정보 관련 라우팅
app.use('/attendance',attendance_route);
app.use('/data',beaconData_route);
app.use('/movement',function(req,res){
  res.render('movementList');
})
// =======
//이동 정보 관련 라우팅
app.use('/movementList',movement_route);
// >>>>>>> heoyongjun

app.listen(3000,function(){
  console.log("start");
});
