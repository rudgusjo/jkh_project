//메인페이지 출력
module.exports.renderIndex = function(req,res,next){

	var indexInfo = require('../models/readCheckInfo');
	indexInfo.indexInfo(req,res);
}
