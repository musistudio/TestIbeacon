var x_last = p_last = 5;
function kalman(value) {
    var R = 10;
    var Q = 20;
    var x_mid = x_last;
    var x_now;
    var p_mid;
    var p_now;
    var kg;
    p_mid = p_last + Q;
    kg = p_mid / (p_mid+R);
    x_now = x_mid + kg * (value - x_mid);
    p_now = (1 - kg) * p_mid;
    p_last = p_now;
    x_last = x_now;
    console.log("x:"+x_last+"p:"+p_last)
    return x_now;
}

var width = new Array();
var height = new Array();

function wm(value) {
    width.append(value);
    if(width.length >= 15){
        width.shift();
    }
    var res = 0;
    for(var i=0;i<width.length;i++){
        res += height[i];
    }
    var result = res / width.length;
    return result;
}

function hy(value) {
    var res = 0;
    height.append(value);
    if(height.length >= 15){
        height.shift();
    }
    for(var i=0;i<height.length;i++){
        res += height[i];
    }
    var result = res / height.length;
    return result;
}
