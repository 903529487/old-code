function PasswordStrength(passwordID, strengthID) {
	this.init(strengthID);
	var _this = this;
	document.getElementById(passwordID).onkeyup = function() {
		_this.checkStrength(this.value);
	}
};
PasswordStrength.prototype.init = function(strengthID) {
	var id = document.getElementById(strengthID);

	this.oStrengthTxt = id
};
PasswordStrength.prototype.checkStrength = function(val) {
	var aLvTxt = ['最少6位数', '低', '中', '高'];
	var lv = 0;
	if(val.match(/[a-z]/g)) {
		lv++;
	}
	if(val.match(/[0-9]/g)) {
		lv++;
	}
	if(val.match(/(.[^a-z0-9])/g)) {
		lv++;
	}
	if(val.length < 6) {
		lv = 0;
	}
	if(lv > 3) {
		lv = 3;
	}

	this.oStrengthTxt.innerHTML = "密码强度为：" + aLvTxt[lv];
};