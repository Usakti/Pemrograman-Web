function BilPrima() {
    let x = "";
    let max=50;
    for (i=2; i<=max ; i++){
        if(i>=2){
            bil = true;
            for(j=2; j<i; j++){
                if(i%j==0){
                    bil=false;    
                    }
                }
            }
        if(bil==true){
            x += " " + i + " ";
        }
    }
    document.getElementById("Bil").innerHTML = x;
}
