
//금일 출석 리스트
module.exports.renderList = function(req,res){

	
	// var test = require('../models/updateCheckInfo');
	// test.updateComeInInfo("2017-09-14","10:00",2.8,'jokyeonghyeon',res);

	// return console.log("gg");
	// res.render('attendance/list',{info:'금일 출석 리스트'});

	var todayAttInfo = require('../models/readCheckInfo');
	todayAttInfo.readTodayAttInfo('attendance',req,res);
}

//금일 출석 지각 리스트
module.exports.renderLateList = function(req,res){
	var todayAttInfo = require('../models/readCheckInfo');
	todayAttInfo.readTodayAttInfo('lateness',req,res);
	// res.render('attendance/list',{info:'금일 지각 리스트'});
}
//금일 출석 결석 리스트
module.exports.renderAbsenceList = function(req,res){
	var todayAttInfo = require('../models/readCheckInfo');
	todayAttInfo.readTodayAttInfo('absence',req,res);
  // res.render('attendance/list',{info:'금일 결석 리스트'});
}
//월별 지각자 랭크
module.exports.renderLateRank = function(req,res){
  res.render('attendance/lateRank',{info:'지각자 랭크'});
}
//출석 전체 정보
module.exports.renderHistory = function(req,res){

	var HistoryInfo = require('../models/readCheckInfo');
	HistoryInfo.readHistoryInfo(req,res);

	// res.render('attendance/history',{info:'줄석부'});
}


/*================ 숫자포맷단위 맞추기(날짜용) ================*/
function leadingZeros(n, digits) {
  var zero = '';
  n = n.toString();

  if (n.length < digits) {
    for (i = 0; i < digits - n.length; i++)
      zero += '0';
  }
  return zero + n;
}
/*=====================================================*/