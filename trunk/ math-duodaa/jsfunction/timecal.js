function shijian(postTime, currentTime) 
{
var pTime = new Date(Date.parse(postTime.split("-").join("/")));
var cTime = new Date(Date.parse(currentTime.split("-").join("/")));
var diff = cTime - pTime;

if (diff >= 0 & diff < 60 * 1000) return ("刚刚");    //1分钟内

else if (diff < 5 * 60 * 1000) return ("五分钟内");   //五分钟内

else if (diff < 10 * 60 * 1000) return ("十分钟内");  //十分钟内

else if (diff < 30 * 60 * 1000) return ("半小时内");   // 30分钟内

else if (diff < 60 * 60 * 1000) return ("一小时内");   // 一小时内

else if (diff < 2 * 60 * 60 * 1000) return ("两小时内");   // 2小时内

else if (diff < 5 * 60 * 60 * 1000) return ("五小时内");   // 5小时内

else if (diff < 12 * 60 * 60 * 1000) return ("半天以内");   // 12小时内

else if (diff < 24 * 60 * 60 * 1000) return ("一天以内");   // 24小时内

else if (diff < 3 * 24 * 60 * 60 * 1000) return ("三天以内");   // 三天以内

else if (diff < 7 * 24 * 60 * 60 * 1000) return ("一周以内");   // 7天以内

else if (diff < 30 * 24 * 60 * 60 * 1000) return ("一月以内");   // 30天以内

else if (diff < 91 * 24 * 60 * 60 * 1000) return ("三月以内");   // 91天以内

else if (diff < 182 * 24 * 60 * 60 * 1000) return ("半年以内");   // 182天以内

else if (diff < 365 * 24 * 60 * 60 * 1000) return ("一年以内");   // 365天以内

else if (diff >= 365 * 24 * 60 * 60 * 1000) return ("一年以前");   // 365天以外
}