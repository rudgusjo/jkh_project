var mongoose = require('mongoose');

var checkInfo = mongoose.Schema({
		std_id		: "String",
		password	: "String",
		identifier	: "String",
		name        : "String",
    	class 		: "String",
		inClass : "Boolean",
		check_schema : [],		//지각 및 결석여부 판별 스키마
		come_in_schema : [],	//들어온 시간기록 스키마
		get_out_schema : [],	//나간 시간기록 스키마
		stay_stats_schema : []	//머무른 시간 및 나간횟수 스키마
	});

   
module.exports.schema = checkInfo;
mongoose.connection.close();
