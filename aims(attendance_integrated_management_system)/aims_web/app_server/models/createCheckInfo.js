
/*====================check_info 더미값 저장=====================*/
module.exports.inputUserInfo = function(res){
	var checkInfoSchema = require('./checkInfoSchema');
	var mongoose = require('mongoose');
	mongoose.Promise = global.Promise;
	mongoose.connect('mongodb://localhost:27017/aims');
  // mongoose.connect('mongodb://localhost:5050/aims');

	var checkInfos = mongoose.model('check_info',checkInfoSchema.schema);
  mongoose.connection.close();

  var checkInfo1 = new checkInfos({
    'std_id'      : '1300001',
    'password'    : 'test1',
    'identifier'  : 'leeseunghyun',
    'name'        : '이승현',
    'class'       : '3_j',
    'inClass'     : false,
    'check_schema' : [
      {
        'absence' : false, //결석 여부
        'lateness' : false,    //지각 여부
        'date' : "2017-09-17", //해당 날짜
        'time' : "8:44" //해당 시간
      }]
    ,
    'come_in_schema' : [
      {
        'date':'2017-08-29',  //해당 날짜 
        'time_data': [        //그 날의 시간기록
          {'num' : 1, 'time':'08:45'},
          {'num' : 2, 'time':'09:59'}
        ]
      }]
    ,
    'get_out_schema' : [
      {
        'date':'2017-08-29',  //해당 날짜
        'time_data': [        //그 날의 시간기록
          {'num' : 1, 'time':'09:51'},
          {'num' : 2, 'time':'10:52'}
        ]  
      }]
    ,
    'stay_stats_schema' : [
      { 
        'record_date':'2017-08-29',
        'all_stay_time' : '11', //총 머무른시간 
        'get_out_count' : '10'  //총 나간 횟수
      }]
  });

  var checkInfo2 = new checkInfos({
    'std_id'      : '1300002',
    'password'    : 'test2',
    'identifier'  : 'jokyeonghyeon',
    'name'        : '조경현',
    'class'       : '3_j',
    'inClass'     : false,
    'check_schema' : [
      {
        'absence' : false, //결석 여부
        'lateness' : false,    //지각 여부
        'date' : "2017-09-17", //해당 날짜
        'time' : "8:45" //해당 시간
      }]
    ,
    'come_in_schema' : [
      {
        'date':'2017-08-29',  //해당 날짜 
        'time_data': [        //그 날의 시간기록
          {'num' : 1, 'time':'08:45'},
          {'num' : 2, 'time':'09:59'}
        ]
      }
    ],
    'get_out_schema' : [
      {
        'date':'2017-08-29',  //해당 날짜
        'time_data': [        //그 날의 시간기록
          {'num' : 1, 'time':'09:51'},
          {'num' : 2, 'time':'10:52'}
        ]  
      }
    ],
    'stay_stats_schema' : [
      { 
        'record_date':'2017-08-29',
        'all_stay_time' : '11', //총 머무른시간 
        'get_out_count' : '10'  //총 나간 횟수
      }
    ]
  });

  var checkInfo3 = new checkInfos({
    'std_id'      : '1300003',
    'password'    : 'test3',
    'identifier'  : 'test3',
    'name'        : '김진영',
    'class'       : '3_j',
    'inClass'     : false,
    'check_schema' : [
      {
        'absence' : false, //결석 여부
        'lateness' : true,    //지각 여부
        'date' : "2017-09-17", //해당 날짜
        'time' : "8:51" //해당 시간
      }]
    ,
    'come_in_schema' : [
      {
        'date':'2017-08-29',  //해당 날짜 
        'time_data': [        //그 날의 시간기록
          {'num' : 1, 'time':'08:45'},
          {'num' : 2, 'time':'09:59'}
        ]
      }
    ],
    'get_out_schema' : [
      {
        'date':'2017-08-29',  //해당 날짜
        'time_data': [        //그 날의 시간기록
          {'num' : 1, 'time':'09:51'},
          {'num' : 2, 'time':'10:52'}
        ]  
      }
    ],
    'stay_stats_schema' : [
      { 
        'record_date':'2017-08-29',
        'all_stay_time' : '11', //총 머무른시간 
        'get_out_count' : '10'  //총 나간 횟수
      }
    ]
  });

  var checkInfo4 = new checkInfos({
    'std_id'      : '1300004',
    'password'    : 'test4',
    'identifier'  : 'test4',
    'name'        : '허용준',
    'class'       : '3_j',
    'inClass'     : false,
    'check_schema' : [
      {
        'absence' : true, //결석 여부
        'lateness' : false,    //지각 여부
        'date' : "2017-09-17", //해당 날짜
        'time' : "00:00" //해당 시간
      }]
    ,
    'come_in_schema' : [
      {
        'date':'2017-08-29',  //해당 날짜 
        'time_data': [        //그 날의 시간기록
          {'num' : 1, 'time':'08:45'},
          {'num' : 2, 'time':'09:59'}
        ]
      }
    ],
    'get_out_schema' : [
      {
        'date':'2017-08-29',  //해당 날짜
        'time_data': [        //그 날의 시간기록
          {'num' : 1, 'time':'09:51'},
          {'num' : 2, 'time':'10:52'}
        ]  
      }
    ],
    'stay_stats_schema' : [
      { 
        'record_date':'2017-08-29',
        'all_stay_time' : '11', //총 머무른시간 
        'get_out_count' : '10'  //총 나간 횟수
      }
    ]
  });

  checkInfo1.save(function(err){
    if(err) return handleError(err);
  });

  checkInfo2.save(function(err){
    if(err) return handleError(err);
  });

  checkInfo3.save(function(err){
    if(err) return handleError(err);
  });

  checkInfo4.save(function(err){
    if(err) return handleError(err);
  });

  res.send('생성완료');
}
/*============================================================*/




/*===========================회원가입===============================*/
module.exports.signUpInfo = function(res,stdId,password,name,classInfo){
  var checkInfoSchema = require('./checkInfoSchema');
  var mongoose = require('mongoose');
  mongoose.Promise = global.Promise;
  mongoose.connect('mongodb://localhost:27017/aims');
  // mongoose.connect('mongodb://localhost:5050/aims');

  var checkInfos = mongoose.model('check_info',checkInfoSchema.schema);
  mongoose.connection.close();

  var checkInfo1 = new checkInfos({
    'std_id'      : stdId,
    'password'    : password,
    'identifier'  : 'empty',
    'name'        : name,
    'class'       : classInfo,
    'inClass'     : false,
    'check_schema' : [
      ]
    ,
    'come_in_schema' : [
      ]
    ,
    'get_out_schema' : [
      ]
    ,
    'stay_stats_schema' : [
      ]
  });



  checkInfo1.save(function(err){
    if(err) return handleError(err);
  });

  console.log('생성완료');
  var alertScript = "회원가입이 완료되었습니다.";
  var url  = "http://localhost:3000/sign/in";
  return res.render('../views/pages/scriptAlert',{
    data:alertScript,
    url : url
  });
  
}
/*============================================================*/


/*====================check_info 더미값 저장=====================*/
module.exports.appSignUpInfo = function(res,stdId,password,name,classInfo){
  var checkInfoSchema = require('./checkInfoSchema');
  var mongoose = require('mongoose');
  mongoose.Promise = global.Promise;
  mongoose.connect('mongodb://localhost:27017/aims');
  // mongoose.connect('mongodb://localhost:5050/aims');

  var checkInfos = mongoose.model('check_info',checkInfoSchema.schema);
  mongoose.connection.close();

  var checkInfo1 = new checkInfos({
    'std_id'      : stdId,
    'password'    : password,
    'identifier'  : 'empty',
    'name'        : name,
    'class'       : classInfo,
    'inClass'     : false,
    'check_schema' : [
      ]
    ,
    'come_in_schema' : [
      ]
    ,
    'get_out_schema' : [
      ]
    ,
    'stay_stats_schema' : [
      ]
  });



  checkInfo1.save(function(err){
    if(err) {
      handleError(err);
      return false;
    }
  });

  console.log('생성완료');
  return true;
}
/*============================================================*/


