// https://github.com/incompl/keyDecode
window.keyDecode=(function(){var operaOld=false;if(window.opera){var operaVersion=window.navigator.userAgent.match(/Version\/(.+)$/)[1];var operaMajor=Number(operaVersion.match(/^\d+/));var operaMinor=Number(operaVersion.match(/\d+$/));if(operaMajor<9||(operaMajor===9&&operaMinor<50)){operaOld=true;}}
var browser=navigator.userAgent.match('Chrome')?'Chrome':window.opera&&operaOld?'Opera Old':window.opera?'Opera New':navigator.userAgent.match('Firefox')?'Firefox':'IE';var globalMap={32:'space',13:'enter',9:'tab',27:'escape',8:'backspace',16:'shift',17:'control',18:'alt',20:'caps lock',144:'num lock',37:'left',38:'up',39:'right',40:'down',45:'insert',46:'delete',36:'home',35:'end',33:'page up',34:'page down',19:'pause',145:'scroll lock'};var shiftMap={'1':'!','2':'@','3':'#','4':'$','5':'%','6':'^','7':'&','8':'*','9':'(','0':')','[':'{',']':'}','\\':'|',';':':','\'':'"',',':'<','.':'>','/':'?','-':'_','=':'+','`':'~'};var OO_Map={78:'numpad .',96:'`',42:'*',47:'/',219:'left start',220:'right start',59:';',44:',',91:'[',92:'\\',93:']'};var O_Map={57392:'control'};var C_IE_Map={186:';',187:'=',189:'-'};var ON_C_FF_Map={224:'command'};var C_FF_O_Map={59:';',61:'='};var ON_C_FF_IE_Map={110:'numpad .',96:'numpad 0',97:'numpad 1',98:'numpad 2',99:'numpad 3',100:'numpad 4',101:'numpad 5',102:'numpad 6',103:'numpad 7',104:'numpad 8',105:'numpad 9',107:'+',109:'-',106:'*',111:'/',91:'left start',92:'right start',93:'menu',188:',',190:'.',191:'/',192:'`',219:'[',220:'\\',221:']',222:'\''};return function(e){var code=e.keyCode;if(code===0){return'unrecognizeable';}
var shift=e.shiftKey;var result;if(globalMap[code]){return globalMap[code];}
if(code>=65&&code<=90){result=String.fromCharCode(code);if(!shift){result=result.toLowerCase();}
return result;}
if(code>=48&&code<=57){result=String(code-48);}
else if(code>=112&&code<=123){result='f'+(code-111);}
else if(browser==='Opera Old'&&OO_Map[code]){result=OO_Map[code];}
else if(browser.match(/Opera/)&&O_Map[code]){result=O_Map[code];}
else if((browser==='Chrome'||browser==='IE')&&C_IE_Map[code]){result=C_IE_Map[code];}
else if((browser==='Opera New'||browser==='Chrome'||browser==='Firefox')&&ON_C_FF_Map[code]){result=ON_C_FF_Map[code];}
else if((browser==='Opera New'||browser==='Chrome'||browser==='Firefox'||browser==='IE')&&ON_C_FF_IE_Map[code]){result=ON_C_FF_IE_Map[code];}
else if((browser==='Chrome'||browser==='Firefox'||browser.match(/Opera/))&&C_FF_O_Map[code]){result=C_FF_O_Map[code];}
if(shift){result=shiftMap[result]||result;}
return result||'unknown code '+code;};})();