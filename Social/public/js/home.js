let rateButton = document.getElementsByClassName("rate1");
let inputRate = document.getElementsByClassName("inputRate");
let postID = document.getElementsByClassName("postID");
let save = document.getElementsByClassName("save");
let arr_values = document.getElementsByClassName("arr_values");
let icon = document.getElementsByClassName('icon');
let hide = document.getElementsByClassName('show');
let userID = document.getElementsByClassName('userID');
let rateVal = document.getElementsByClassName('rateVal');
let str = '';
for(let i = 0; i < icon.length; i++){
    icon[i].addEventListener('click', (e) => {
        for(let ii=0; ii<icon.length; ii++){
        if(e.target == icon[ii]){
            hide[ii].classList.toggle('hide');
        }
    }
    });
}
for(let i=0; i<rateButton.length; i++){
rateButton[i].addEventListener('click', (e)=>{
    for(let ii=0; ii<rateButton.length; ii++){
        if(e.target == rateButton[ii]){
            let postID1 = postID[ parseInt(ii/2) ].value;
            let oldRate = rateVal[ parseInt(ii/2) ].value;
            let rate1 = ii % 2 ==0 ? 1 : 0;
            let myID1 = userID[parseInt(ii/2)].value;


            let xx = new XMLHttpRequest();
            xx.open('GET', '/rate?userID='+myID1+'&postID='+postID1+"&rate="+rate1+"&rateVal="+oldRate, true);
            xx.setRequestHeader('Accept', 'application/json');
            xx.send();
            xx.onload = () => {
                console.log(xx.responseText);
            }


            if( rateButton[ii].style.backgroundColor == 'rgb(0, 21, 138)'){
                rateButton[ii].style.backgroundColor = 'transparent';
                rateButton[ii].style.color = 'rgb(0, 21, 138)';
                if(ii % 2 == 0){
                    rateButton[ii + 1].style.backgroundColor = 'transparent';
                    rateButton[ii + 1].style.color = 'rgb(0, 21, 138)';
                }else{
                    rateButton[ii - 1].style.backgroundColor = 'transparent';
                    rateButton[ii - 1].style.color = 'rgb(0, 21, 138)';
                }
            }else{
                rateButton[ii].style.backgroundColor = 'rgb(0, 21, 138)';
                rateButton[ii].style.color = 'white'; 
                if(ii % 2 == 0){
                    rateButton[ii + 1].style.backgroundColor = 'transparent';
                    rateButton[ii + 1].style.color = 'rgb(0, 21, 138)';
                }else{
                    rateButton[ii - 1].style.backgroundColor = 'transparent';
                    rateButton[ii - 1].style.color = 'rgb(0, 21, 138)';
                }
            }
         }
    }
});
}
save[0].addEventListener('click', ()=>{
    for(let i=0; i < inputRate.length; i++){
        str += inputRate[i].value;
        inputRate[i].value = null;
    }
    arr_values[0].value = str;
    str = '';
    console.log(arr_values[0].value);
});