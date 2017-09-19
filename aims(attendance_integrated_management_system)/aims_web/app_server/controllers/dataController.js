/*================ 비콘 데이터 -> db 업데이트 ================*/
module.exports.beaconData = function(req,res){
	var startCheckAtt 			= 6;
	var endCheckAtt 			= 9;
	var lateness 				= false;
	var attendance 				= false;
	var date = new Date();
	var nowDate = date.getFullYear() + "-"; 
	nowDate += leadingZeros(date.getMonth()+1, 2)+ "-" + leadingZeros(date.getDate(), 2);
	var nowTime = date.getHours() + ":" + leadingZeros(date.getMinutes(), 2);

	for(key in req.body){
		var obj = JSON.parse(key);
		var data = "UUID: "+obj.UUID+", major: "+obj.major+", minor: "+obj.minor;
		data += ", Distance: "+obj.Distance+", identifier: "+obj.identifier;
		console.log(data);
	}

	if(obj.Distance.toFixed(1) <= 3){ // 비콘에 3미터 이내로 접근했을 경우 반에 들어왔다고 간주
		
		// 아침 출석정보 체크 및 업데이트
		if(date.getHours() >= startCheckAtt && date.getHours() <= endCheckAtt){
			lateness = false;
			if(date.getHours == endCheckAtt && date.getMinutes() > 45){
				lateness = true;
				// console.log("lateness = true");
			}
			var recordCheckAtt = require('../models/updateCheckInfo');
				recordCheckAtt.updateAttInfo(nowDate,nowTime,lateness,attendance,obj.identifier,res);
		}

		// 반에 들어온 시간 업데이트
		var recordCheckComeIn = require('../models/updateCheckInfo');
			recordCheckComeIn.updateComeInInfo(nowDate,nowTime,obj.Distance,obj.identifier,res);
	}else if(obj.Distance.toFixed(1) > 3){
		// get_out 업데이트 
		var recordCheckGetOut = require('../models/updateCheckInfo');
			recordCheckGetOut.updateGetOutInfo(nowDate,nowTime,obj.Distance,obj.identifier,res);
	}

	res.send('전송완료');
}
/*====================================================*/


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