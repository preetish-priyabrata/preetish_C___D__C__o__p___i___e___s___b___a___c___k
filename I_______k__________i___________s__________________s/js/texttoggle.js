// JavaScript Document

function check()
			{
				
				var bpl=document.getElementById('bpl');
				
				
				if(bpl.checked==true)
				{
					document.getElementById('text1').style.display='block';
					return false;
				}
				if(bpl.checked==false)
				{
					document.getElementById('text1').style.display='none';
					return false;	
				}
				
				
			}
			function check2()
			{
				var aay=document.getElementById('aay');
				if(aay.checked==true)
				{
					document.getElementById('text2').style.display='block';
					return false;	
				}
				else if(aay.checked==false)
				{
					document.getElementById('text2').style.display='none';
					return false;	
				}
			}
			function check3()
			{
				var iay=document.getElementById('iay');
				if(iay.checked==true)
				{
					document.getElementById('text3').style.display='block';
					return false;	
				}
				else if(iay.checked==false)
				{
					document.getElementById('text3').style.display='none';
					return false;	
				}
			}
			function check4()
			{
				var kcc=document.getElementById('kcc');
				if(kcc.checked==true)
				{
					document.getElementById('text4').style.display='block';
					return false;	
				}
				else if(iay.checked==false)
				{
					document.getElementById('text4').style.display='none';
					return false;	
				}
			}
			function check5()
			{
				var hc=document.getElementById('hc');
				if(hc.checked==true)
				{
					document.getElementById('text5').style.display='block';
					return false;	
				}
				else if(hc.checked==false)
				{
					document.getElementById('text5').style.display='none';
					return false;	
				}
			}
			function check6()
			{
				var gc=document.getElementById('gc');
				if(gc.checked==true)
				{
					document.getElementById('text6').style.display='block';
					return false;	
				}
				else if(gc.checked==false)
				{
					document.getElementById('text6').style.display='none';
					return false;	
				}
			}
			function check7()
			{
				var lc=document.getElementById('lc');
				if(lc.checked==true)
				{
					document.getElementById('text7').style.display='block';
					return false;	
				}
				else if(lc.checked==false)
				{
					document.getElementById('text7').style.display='none';
					return false;	
				}
			}
			
			function Check1()
			{
				var bank_acc=document.getElementById('bank_acc');
				if(bank_acc.checked==true)
				{
					document.getElementById('text_1').style.display='block';
					return false;	
				}	
				else if(bank_acc.checked==false)
				{
					document.getElementById('text_1').style.display='none';
					return false;	
				}
			}
			function Check2()
			{
				var db_card=document.getElementById('db_card');
				if(db_card.checked==true)
				{
					document.getElementById('text_2').style.display='block';
					return false;	
				}	
				else if(db_card.checked==false)
				{
					document.getElementById('text_2').style.display='none';
					return false;	
				}
			}
			function Check3()
			{
				var ps=document.getElementById('ps');
				if(ps.checked==true)
				{
					document.getElementById('text_3').style.display='block';
					return false;	
				}	
				else if(ps.checked==false)
				{
					document.getElementById('text_3').style.display='none';
					return false;	
				}
			}
			
			function check_1()
			{
				var v_card=document.getElementById('v_card');
				if(v_card.checked==true)
				{
					document.getElementById('t1').style.display='block'	;
					return false;
				}	
				else if(v_card.checked==false)
				{
					document.getElementById('t1').style.display='none'	;
					return false;
				}
			}
			function check_2()
			{
				var a_card=document.getElementById('a_card');
				if(a_card.checked==true)
				{
					document.getElementById('t2').style.display='block'	;
					return false;
				}	
				else if(a_card.checked==false)
				{
					document.getElementById('t2').style.display='none'	;
					return false;
				}
			}
			function check_3()
			{
				var passport=document.getElementById('passport');
				if(passport.checked==true)
				{
					document.getElementById('t3').style.display='block'	;
					return false;
				}	
				else if(passport.checked==false)
				{
					document.getElementById('t3').style.display='none'	;
					return false;
				}
			}