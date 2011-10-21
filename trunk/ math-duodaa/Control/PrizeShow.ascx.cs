using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Control_PrizeShow : System.Web.UI.UserControl
{
    string[] PrAm;
    string[] PrPc;
    string[] PrPs;
    string PrUn;

    protected void Page_Load(object sender, EventArgs e)
    {

        ImgShow.ImageUrl = @"\images\prizeimg\" + this.Attributes["PrizeID"] + ".jpg";
        PrizeContent pc = new PrizeContent(this.Attributes["PrizeID"]);
        
        PrAm =pc.PrizeAmount.Split(new char[] { '|' });
        PrUn = pc.PrizeUnit;
        PrPc = pc.PrizePrice.Split(new char[] { '|' });
        PrPs = pc.PrizeStock.Split(new char[] { '|' });

        string[] PrizeChoiceInfo =new string[PrAm.Length];

        for (int i=0; i < PrAm.Length; i++)
        {
            PrizeChoiceInfo[i] = "兑换" + PrAm[i] + PrUn+",";
            PrizeChoiceInfo[i] += "您将花费嗒币" + PrPc[i] + "。";
        
        }

        PrName.Text = pc.PrizeName;
        AmountChoice.DataSource = PrizeChoiceInfo;
        AmountChoice.DataBind();


        
            
    }
     protected void PrAmounts_SelectedIndexChanged(object sender, EventArgs e)
      {
          
      }

    /*
     protected void setPrizeInfo(string prizeid,int amountselected) 
    
     {

       
     }
    * */
}