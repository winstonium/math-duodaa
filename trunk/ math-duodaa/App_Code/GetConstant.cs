using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
///GetConstant 的摘要说明
/// </summary>
public class GetConstant
{
	public GetConstant()
	{
		//
		//TODO: 在此处添加构造函数逻辑
		//
	}

    public static int[] AddPointClass = new int[]  // 加分项目配置
    {
        20,             //0,每日加首次登录加分
        2,             //1,回答问题加分，每天上限20
        20,            //2,问答被采纳Base加分
        1,             //3,答案被好评加分，每天上限20
        0
    };

     public static int[] AddGoldClass = new int[]  // 加金币项目配置
    {
        0,             //0,每日加首次登录加金币
        2,             //1,回答问题加金币，每天上限20
        20,            //2,问答被采纳加Base金币
        1,             //3,答案被好评加金币，每天上限20分
        0
    };

     public static string[] LogType = new string[] //log类型名称 
     { 
         "AskQuestion_",        //0 提问，后面跟上问题的id 
         "ExchangePrize_",     //1 兑换奖品,使用时加上物品id
         "DayFirstLogin",      //2 每日首次登录
         "QuestionAccepted",   //3 问题被采纳
         "QusetionSuported",   //4 问题被支持
         "AnswerQusqtion",     //5
         "Encourage_",         //6 奖励加分，使用时加上奖励原因
         "Punish_" ,           //7 处罚，使用时加上处罚原因
         "AswerQuestion_"       //8 回答问题，跟上回答的id
     };

     public static string[] gradeClassName = new string[]  // 问题分类类别名
    {
        "其它",
        "小学或学前数学",             
        "中学数学",             
        "大学数学",             
        "专业数学",
        "实际问题"
        
    };

     public static int QTIME = 15;  //默认问题过期时长，单位‘天’

}