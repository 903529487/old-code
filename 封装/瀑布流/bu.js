var wrap = document.querySelector("#wrap");
//生成随机高度
function rand(min, max) {
    return parseInt(Math.random() * (max - min) + min);
}
var colsArr = []; //定义一个数组 存放每一列的高度
//得到当前窗口下的总列数
function getCols() {
    colsArr = [];
    var wWidth = document.body.clientWidth;
    //得到总列数
    var cols = parseInt(wWidth / (200 + 10));
    for (var i = 0; i < cols; i++) {
        colsArr.push(0);
    }
}
getCols();
//创建一个LI  追加到父元素中
function createLi(index) {
    var li = document.createElement("li");
    var num = rand(100, 200);
    li.style.height = num + "px";
    li.style.lineHeight = num + "px";
    li.innerHTML = index;
    wrap.appendChild(li);
    setPos(li);
}

//计算LI所在的实际位置
function setPos(li) {
    //初始下标为0
    var minIndex = 0;
    var minHeight = colsArr[minIndex];
    //colsArr = [0,0,0,]
    for (var i = 0; i < colsArr.length; i++) {
        if (minHeight > colsArr[i]) {
            minIndex = i;
            minHeight = colsArr[i];
        }
    }
    li.style.top = minHeight+ "px";
    li.style.left = minIndex * (200 + 10) + "px";

    colsArr[minIndex] += li.clientHeight;
}
var count = 1;

function _run(num) {
    num ? num : num = 20 ;    
    for (var i = 0; i < num; i++) {
        createLi(count++);
    }
}
_run();
//监听滚动事件
window.onscroll = function() {
    //得到滚动距离
    var sHeight = document.documentElement.scrollTop || document.body.scrollTop;
    //得到总的高度 含滚动长的距离
    var aHeight = document.body.scrollHeight;
    //得到页面的视口高度
    var cHeight = document.documentElement.clientHeight || document.body.clientHeight;
    console.log(sHeight, aHeight, cHeight);
    //如果视口高度 + 滚动距离 超过了 总高度  则追加下X条
    if (cHeight + sHeight >= aHeight) {
        _run(30);
    }
};
window.onresize = function() {
    getCols();
    var lis = document.querySelectorAll("li");
    for (var i = 0; i < lis.length; i++) {
        setPos(lis[i]);
    }
};
