function pricing(gallons){
    switch (true){
        case gallons < 1000:
            document.getElementById("totalAmountDue").value=(1.5*0.03+1.5)*gallons;
            return 1.5+1.5*0.03;
            break;
        default :
            document.getElementById("totalAmountDue").value=(1.5*0.02+1.5)*gallons;
            return 1.5+1.5*0.02;
            break;
        
    }
}
