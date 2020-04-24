var unitDetails_Demo={
    Code       :"kit501",
    Name       :"ICT fundamental technology",
    Coordinator:"Tony Grey",
    Day     :"Monday",
    Start   :"11:00",
    End     :"13:00",
    Tutorial1  :{
        Day:"Monday",
        Start:"8:00",
        End:"12:00",
        location:"Nth.7",
        current:10,
        max:20
    },
    Tutorial2  :{
        Day:"Tuesday",
        Start:"11:00",
        End:"12:00",
        location:"Sth.16",
        current:17,
        max:20
    } 
};

var DemoLecTime=unitDetails_Demo.Day+" "+unitDetails_Demo.Start+" - "+unitDetails_Demo.End;
var DemoTut1Info=unitDetails_Demo.Tutorial1.Day+" "+unitDetails_Demo.Tutorial1.Start+" - "+unitDetails_Demo.Tutorial1.End+"\t"+unitDetails_Demo.Tutorial1.location;
var DemoTut2Info=unitDetails_Demo.Tutorial2.Day+" "+unitDetails_Demo.Tutorial2.Start+" - "+unitDetails_Demo.Tutorial2.End+"\t"+unitDetails_Demo.Tutorial2.location;


var Demo_UserInfo={

     enroll_unit1:{
         Code:null,
         Tutoral:null,
         Tutoral_allocate:0

     },
     enroll_unit2:{
        Code:null,
        Tutoral:null

    },
    enroll_unit3:{
        Code:null,
        Tutoral:null
    }

};