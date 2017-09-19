// module.exports.recordAttInfo = function(date,req,res){
// 	var checkInfoSchema = require('./checkInfoSchema');
// 	var mongoose = require('mongoose');
// 	mongoose.Promise = global.Promise;
//   mongoose.connect('mongodb://localhost:27017/aims');
// 	// mongoose.connect('mongodb://localhost:5050/aims');

// 	var checkInfos = mongoose.model('check_info',checkInfoSchema.schema);
//   mongoose.connection.close();

//   // 업데이트로 새로운 document 추가하는거 수정하기
//   checkInfos.findByIdAndUpdate(req.session.user._id,{ $push : {
//       'check_schema' : 
//       {
//         'attendance' : false, //결석 여부
//         'lateness' : false,    //지각 여부
//         'time' : "2017-09-03" //해당 날짜
//       }     
//     }},{multi:true},function(err,model){
//     console.log(err);
//   });

//   // checkInfos.save(function(err){
//   //   if(err) return handleError(err);
//   // });
//   res.send('수정완료');
// }





/*=====================아침 출석정보 유무확인 및 저장======================*/
module.exports.updateAttInfo = function(nowDate,nowTime,lateness,absence,identifier,res){
  // ====================몽고 db 연결 부분=======================
  var checkInfoSchema = require('./checkInfoSchema');
  var mongoose = require('mongoose');
  mongoose.Promise = global.Promise;
  mongoose.connect('mongodb://localhost:27017/aims');
  // mongoose.connect('mongodb://localhost:5050/aims');

  var checkInfos = mongoose.model('check_info',checkInfoSchema.schema);
    mongoose.connection.close();
  // ========================================================
  
  checkInfos.find({'identifier':identifier},'check_schema',function(err,data){

    if(typeof(data[0]) != "undefined"){
      var checkSchema = data[0].check_schema;
      var dateExist = false;
      for(var i = 0; i < checkSchema.length; i++){
        if(nowDate == checkSchema[i].date){
          dateExist = true;
        }
      }
      if(!dateExist){
        checkInfos.update({'identifier': identifier},{ $push : {
            'check_schema' : 
              {
                'absence'  : absence,  //결석 여부
                'lateness'    : lateness,  //지각 여부
                  'date'      : nowDate      //해당 날짜
                  'time'      : nowTime      //해당 날짜
              }     
            }},{multi:true},function(err,model){
            console.log(err);
        });
      }
    }
  });
}
/*==========================================================*/


/*===================== 들어온 시간정보 업데이트 ======================*/
module.exports.updateComeInInfo = function(nowDate,nowTime,nowDistance,identifier,res){
// ====================몽고 db 연결 부분=======================
  var checkInfoSchema = require('./checkInfoSchema');
  var mongoose = require('mongoose');
  mongoose.Promise = global.Promise;
  mongoose.connect('mongodb://localhost:27017/aims');
  // mongoose.connect('mongodb://localhost:5050/aims');

  var checkInfos = mongoose.model('check_info',checkInfoSchema.schema);
  mongoose.connection.close();
  // ========================================================
  
  checkInfos.find({'identifier':identifier},function(err,data){
    
    // console.log(data[0].distance);
    // console.log(data[0].come_in_schema[0].date);
    if(typeof(data[0]) != "undefined"){
      var inClass = data[0].inClass;
      var lastIndex = data[0].come_in_schema.length - 1;
      // console.log(data[0]);

      if(inClass == false){
        // for(var i = 0; i < data[0].come_in_schema.length; i++){
          // console.log(nowDate);
          // console.log(data[0].come_in_schema[i].date);
          console.log(0000);
          if(nowDate != data[0].come_in_schema[lastIndex].date){  //돌어온 시간 체크가 그날 하루에서 처음일 때
            checkInfos.update({'identifier': identifier},{ $push : {
              'come_in_schema' : 
                {
                  'time_data':[{
                    'num' : 1,
                    'time': nowTime
                  }],
                  'date' : nowDate
                }     
              }},{multi:true},function(err,model){
                console.log(err);
            });
            console.log(1111);
            checkInfos.update({'identifier': identifier},{ $set : {
                'inClass' : true
              }},{multi:true},function(err,model){
                console.log(err);
            });
            console.log(2222);
          }else if(nowDate == data[0].come_in_schema[lastIndex].date){  
            //해당 날짜에 대한 스키마가 이미 있어서 들어온 시간만 기록할 경우
            checkInfos.find({'identifier':identifier},'come_in_schema',function(err,data){
              // console.log(data[0].come_in_schema[0].time_data.length);

              var TimeDataNum = data[0].come_in_schema[0].time_data.length + 1;
              var timeDataObj = new Object();
              timeDataObj.time  = nowTime;
              timeDataObj.num   = TimeDataNum;
              checkInfos.update({'identifier': identifier, 'come_in_schema.date':nowDate},{ $push : { 
                  'come_in_schema.$.time_data': timeDataObj
                }},{
                      multi:true
                  },function(err,model){
                  console.log(err);
              });
              checkInfos.update({'identifier': identifier},{ $set : {
                'inClass' : true
                }},{multi:true},function(err,model){
                  console.log(err);
              });
            });
          }
        // }
      }
    }
  });
}
/*==========================================================*/


/*===================== 들어온 시간정보 업데이트 ======================*/
module.exports.updateGetOutInfo = function(nowDate,nowTime,nowDistance,identifier,res){
  // ====================몽고 db 연결 부분=======================
  var checkInfoSchema = require('./checkInfoSchema');
  var mongoose = require('mongoose');
  mongoose.Promise = global.Promise;
  mongoose.connect('mongodb://localhost:27017/aims');
  // mongoose.connect('mongodb://localhost:5050/aims');

  var checkInfos = mongoose.model('check_info',checkInfoSchema.schema);
  mongoose.connection.close();
  // ========================================================
  
  checkInfos.find({'identifier':identifier},function(err,data){
    
    // console.log(data[0].distance);
    // console.log(data[0].get_out_schema[0].date);
    if(typeof(data[0]) != "undefined"){
      var inClass = data[0].inClass;
      var lastIndex = data[0].get_out_schema.length - 1;
      // console.log(data[0]);

      if(inClass == true){
        // for(var i = 0; i < data[0].get_out_schema.length; i++){
          // console.log(nowDate);
          // console.log(data[0].get_out_schema[i].date);
          if(nowDate != data[0].get_out_schema[lastIndex].date){  //돌어온 시간 체크가 그날 하루에서 처음일 때
            checkInfos.update({'identifier': identifier},{ $push : {
              'get_out_schema' : 
                {
                  'time_data':[{
                    'num' : 1,
                    'time': nowTime
                  }],
                  'date' : nowDate
                }     
              }},{multi:true},function(err,model){
                console.log(err);
            });
            checkInfos.update({'identifier': identifier},{ $set : {
                'inClass' : true
              }},{multi:true},function(err,model){
                console.log(err);
            });
          }else if(nowDate == data[0].get_out_schema[lastIndex].date){  
            //해당 날짜에 대한 스키마가 이미 있어서 들어온 시간만 기록할 경우
            checkInfos.find({'identifier':identifier},'get_out_schema',function(err,data){
              // console.log(data[0].get_out_schema[0].time_data.length);

              var TimeDataNum = data[0].get_out_schema[0].time_data.length + 1;
              var timeDataObj = new Object();
              timeDataObj.time  = nowTime;
              timeDataObj.num   = TimeDataNum;
              checkInfos.update({'identifier': identifier, 'get_out_schema.date':nowDate},{ $push : { 
                  'get_out_schema.$.time_data': timeDataObj
                }},{
                      multi:true
                  },function(err,model){
                  console.log(err);
              });
              checkInfos.update({'identifier': identifier},{ $set : {
                'inClass' : true
                }},{multi:true},function(err,model){
                  console.log(err);
              });
            });
          }
        // }
      }
    }
  });
}
/*==========================================================*/