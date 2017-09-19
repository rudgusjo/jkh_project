
/*====================로그인 확인 및 세션 저장=====================*/
module.exports.checkUser = function(argStdId,argPass,req,res){
	// ====================몽고 db 연결 부분=======================
	var checkInfoSchema = require('./checkInfoSchema');
	var mongoose = require('mongoose');
	mongoose.Promise = global.Promise;
	mongoose.connect('mongodb://localhost:27017/aims');
	// mongoose.connect('mongodb://localhost:5050/aims');

	var checkInfos = mongoose.model('check_info',checkInfoSchema.schema);
  	mongoose.connection.close();
	// ========================================================

	checkInfos.find({'std_id':argStdId,'password':argPass},function(err,data){

		var authenticated;
		for(var i in data){
			authenticated = data[i];
		}
		
		if(authenticated == undefined){
			var alertScript = "잘못된 아이디 혹은 비밀번호 입니다.";
			var url  = "-1";
			return res.render('../views/pages/scriptAlert',{
				data:alertScript,
				url : url
			});
		}		

		req.session.user = authenticated;
		// console.log(req.session.user);
		return res.redirect('/');
		
	});

}
/*==========================================================*/


/*====================로그인 확인 및 세션 저장=====================*/
module.exports.checkAppUser = function(argStdId,argPass,req,res){
	// ====================몽고 db 연결 부분=======================
	var checkInfoSchema = require('./checkInfoSchema');
	var mongoose = require('mongoose');
	mongoose.Promise = global.Promise;
	mongoose.connect('mongodb://localhost:27017/aims');
	// mongoose.connect('mongodb://localhost:5050/aims');

	var checkInfos = mongoose.model('check_info',checkInfoSchema.schema);
  	mongoose.connection.close();
	// ========================================================

	checkInfos.find({'std_id':argStdId,'password':argPass},function(err,data){

		var authenticated;
		for(var i in data){
			authenticated = data[i];
		}
		
		if(authenticated == undefined){
			return false;
		}		

		req.session.user = authenticated;
		// console.log(req.session.user);
		return true;
	});

}
/*==========================================================*/


/*==================== indexController => 메인화면 데이터 구성 =====================*/
module.exports.indexInfo = function(req,res){
	// ====================몽고 db 연결 부분=======================
	var checkInfoSchema = require('./checkInfoSchema');
	var mongoose = require('mongoose');
	mongoose.Promise = global.Promise;
	mongoose.connect('mongodb://localhost:27017/aims');
	// mongoose.connect('mongodb://localhost:5050/aims');

	var checkInfos = mongoose.model('check_info',checkInfoSchema.schema);
  	mongoose.connection.close();
	// ========================================================

	checkInfos.find({},function(err,data){
		var countAttendance = 0;
		var countLateness 	= 0;
		var countAbsence 	= 0;
		var HistoryViewCount= data.length < 10 ? data.length : 10;

		for(var i = 0; i < data.length; i++){
			if(data[i].check_schema[data[i].check_schema.length - 1].lateness == true && 
			   data[i].check_schema[data[i].check_schema.length - 1].absence  == false){
				countLateness++;
			}else if(data[i].check_schema[data[i].check_schema.length - 1].lateness == false && 
			   data[i].check_schema[data[i].check_schema.length - 1].absence  == true){
				countAbsence++;
			}else if(data[i].check_schema[data[i].check_schema.length - 1].lateness == false && 
			   data[i].check_schema[data[i].check_schema.length - 1].absence  == false){
				countAttendance++;
			}
		}

		res.render('index',{
			todayAttendance : countAttendance,
			todayLateness: countLateness,
			todayAbsence: countAbsence,
			attendanceHistory : data,
			HistoryViewCount : HistoryViewCount
		});	

	});

	//.limit();

}
/*==========================================================*/




/*==================== attendanceController => 출석이력 상세 =====================*/
module.exports.readHistoryInfo = function(req,res){
	// ====================몽고 db 연결 부분=======================
	var checkInfoSchema = require('./checkInfoSchema');
	var mongoose = require('mongoose');
	mongoose.Promise = global.Promise;
	mongoose.connect('mongodb://localhost:27017/aims');
	// mongoose.connect('mongodb://localhost:5050/aims');

	var checkInfos = mongoose.model('check_info',checkInfoSchema.schema);
  	mongoose.connection.close();
	// ========================================================

	checkInfos.find({},function(err,data){

		res.render('attendance/history',{history:data});	

	}).sort({ 'check_schema.time':-1});

	//.limit();

}
/*==========================================================*/




/*==================== attendanceController => 금일 출석 현황 =====================*/
module.exports.readTodayAttInfo = function(pageKind,req,res){
	// ====================몽고 db 연결 부분=======================
	var checkInfoSchema = require('./checkInfoSchema');
	var mongoose = require('mongoose');
	mongoose.Promise = global.Promise;
	mongoose.connect('mongodb://localhost:27017/aims');
	// mongoose.connect('mongodb://localhost:5050/aims');

	var checkInfos = mongoose.model('check_info',checkInfoSchema.schema);
  	mongoose.connection.close();
	// ========================================================

	checkInfos.find({},function(err,data){

		res.render('attendance/list',{
			history : data,
			pageKind: pageKind
		});	

	}).sort({ 'name':1});

	//.limit();

}
/*==========================================================*/







