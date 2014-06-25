var lang_array=[];
var sel_lang_array=[];
//var unsel_lang_array=[];
var max_lang=0; // maximum languages
$(document).ready(function(){
    $("#remove_number").hide();
    $("#add_number").click(function(){ // function to add contact  number
        var div=document.getElementById('contact_holder');
        var newfield=document.createElement("input");
        newfield.setAttribute('type','text');
        newfield.setAttribute('placeholder','Secondary Contact');
        newfield.setAttribute('maxlength',"10");
        newfield.setAttribute("class","form-control");
        newfield.setAttribute('onKeyPress',"return isNumber(event)");
        var inner_div=document.createElement("div");
        inner_div.setAttribute("class","col-lg-2");
        var nm=1;
        if(div.hasChildNodes())
        {
            var len=div.childNodes.length;
            var nm=len;
            nm++;
            if(nm==2)
            {
                $("#add_number").hide();
            }
            else if(nm>2)
                return false;
            newfield.setAttribute('name','contact'+nm);
            newfield.setAttribute('id','contact'+nm);
        }
        else
        {
            newfield.setAttribute('name','contact1');
            newfield.setAttribute('id','contact1');
        }
        inner_div.id="sec_contact"+nm;
        inner_div.appendChild(newfield);
        div.appendChild(inner_div);
        $("#remove_number").show();
    });

    $("#remove_number").click(function(){    //function to remove contact number
        var div=document.getElementById('contact_holder');
        if(div.hasChildNodes())
        {
            var len=div.childNodes.length;
            var nm=len;
            $("#sec_contact"+nm).remove();
            nm--;
            if(nm==1)
                $("#add_number").show();
            else if(nm==0)
            {
                $("#remove_number").hide();return false;
            }
        }
    });

    for(var i=15;i<=85;i++)
        addOption(document.candidate.age,i,i);
    for(var i=4;i<=6;i++)
        addOption(document.candidate.feet,i,i);  //initialising weight, height in personal details
    for(var i=0;i<12;i++)
        addOption(document.candidate.inches,i,i);
    for(var i=20;i<150;i++)
        addOption(document.candidate.weight,i,i);
    for(var i=0;i<=30;i++)
    {
        addOption(document.candidate.job_years,i,i);
        if(i==30)
            addOption(document.candidate.job_years,i+"+",i+"+");
    }
    for(var i=0;i<=12;i++)
        addOption(document.candidate.job_months,i,i);

    $("#force").attr("disabled",true);$("#rank").attr("disabled",true);$("#dod").attr("disabled",true);$("#doj").attr("disabled",true);


} );

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function addOption(selectbox,text,value)
{
    var optn = document.createElement("OPTION");
    optn.text = text;
    optn.value = value;
    selectbox.options.add(optn);
}


function get_areas(city)
{
    $("#residence").empty();
    addOption(document.candidate.residence,"--Select--","");
    var residence=$("#residence");
    $.getJSON('ajax_query.php',{area:city},function(data){
            for(var x=0;x<data.length;x++){
                addOption(document.candidate.residence,data[x].area_name,data[x].area_name);
            }
        }
    );
}
function get_job_areas(city_area)  //getting job preference lcation
{
    $("#job_location").empty();
    addOption(document.candidate.job_location,"--Select--","");
    var residence=$("#job_location");
    $.getJSON('ajax_query.php',{area:city_area},function(data){
            for(var x=0;x<data.length;x++){
                addOption(document.candidate.job_location,data[x].area_name,data[x].area_name);
            }
        }
    );
}

function add_force(opt)//adding content for force select
{
    if(opt=='Yes')
    {
        $(document.candidate.force).empty();
        var cat=new Array("Army","Navy","Air Force","Coast Guard","Paramilitary/Police");
        for(var i=0;i<cat.length;i++)
        {
            addOption(document.candidate.force,cat[i],cat[i]);
        }
        $("#force").removeAttr("disabled");$("#rank").removeAttr("disabled");$("#dod").removeAttr("disabled");$("#doj").removeAttr("disabled");
    }
    else
    {
        $(document.candidate.force).empty();
        addOption(document.candidate.force,"No","No");
        document.candidate.force.selectedIndex=0;
        $("#force").attr("disabled",true);$("#rank").attr("disabled",true);$("#dod").attr("disabled",true);$("#doj").attr("disabled",true);
        document.getElementById("rank").value="";document.getElementById("dod").value="";document.getElementById("doj").value="";
    }
}

function fill_year(x)        // filling education time in years
{
    addOption(x,"--Select--","");
    for(var i =2019;i>=1940;i--)
    {
        addOption(x,i,i);
    }
}
function qualification_details(qualification,name,check,ele)
{
    var counter=name.substr(13,name.length-13);
    if(qualification.indexOf("Pass")<0)
    {
        if(qualification!="Illiterate"&&qualification!="--Select--"&&qualification!="")
        {
            if(counter=="")
                counter=0
            var x=$(".form-control.specialization"+counter); // enabling the rest of the three contents
            var dom_object=$(".form-control.specialization"+counter).get(0);
            x.removeAttr("disabled");
            x.empty();
            $(".form-control.course_type"+counter).removeAttr("disabled");
            $(".form-control.course_year"+counter).removeAttr("disabled");
            $.getJSON("ajax_query.php",{qua:qualification},function(data)
            {
                var len=data.length;                            // filling in the details according to qualification in specification select
                addOption(dom_object,"--Select--","");
                for(i=0;i<len;i++)
                {
                    addOption(dom_object,data[i].spl,data[i].spl);
                }
            });

            if(check==1)  // check==1 shows that the qualification dropdown is clicked 1st tym
            {;}
            else if(check==0) // this shows it has been clicked multiple times
            {
                var temp=parseInt(counter,10)+1; //converting string to int
                $("#row"+temp).remove();
            }

            // generating the lower level of qualification options
            var qualification_sel=document.createElement("select");
            var specialization_sel=document.createElement("select");
            var course_type=document.candidate.course_type0.cloneNode(true);
            var course_year=document.candidate.course_year0.cloneNode(true);
            counter++;
            qualification_sel.setAttribute("name","qualification"+counter);
            qualification_sel.setAttribute("class","form-control qualification"+counter);
            qualification_sel.setAttribute("title","1");
            qualification_sel.setAttribute("onchange","qualification_details(this.value,this.name)");

            specialization_sel.setAttribute("name","specialization"+counter);
            specialization_sel.setAttribute("class","form-control specialization"+counter);
            specialization_sel.setAttribute("disabled","disabled");

            course_type.name="course_type"+counter;
            course_type.setAttribute("class","form-control course_type"+counter);
            course_type.setAttribute("disabled","disabled");
            course_year.name="course_year"+counter;
            course_year.setAttribute("class","form-control course_year"+counter);
            course_year.setAttribute("disabled","disabled");

            var qualification_container=document.getElementById("qualification_container");
            var blank_div=document.createElement("div");
            blank_div.setAttribute("class","col-lg-1");
            var row=document.createElement("div");
            row.id="row"+counter;
            row.setAttribute("class","row");


            var lbl_txt="What did you do before ";
            lbl_txt+=qualification+" ?";
            var lbl_div=document.createElement("div");
            lbl_div.id="lbl"+counter;
            lbl_div.setAttribute("class","col-lg-2");
            lbl_div.appendChild(document.createElement("br"));
            lbl_div.appendChild(document.createTextNode(lbl_txt));
            row.appendChild(blank_div);
            row.appendChild(lbl_div);


            if(qualification=="Post-Graduation"||qualification=="PG Diploma")
            {
                qualification="PG Diploma"; // to merge the selection for PG Diploma and Post Graduation
            }

            $.getJSON("ajax_query.php",{qualify:qualification},function(data){ // getting data for generated selection box
                addOption(qualification_sel,"--Select--","");
                for(var i=0;i<data.length;i++){
                    addOption(qualification_sel,data[i].qua,data[i].qua);
                }
            });

            var qual=document.createElement("div");
            qual.id="qual"+counter;
            qual.setAttribute("class","col-lg-2");
            qual.appendChild(document.createElement("br"));
            row.appendChild(document.createElement("br"));
            qual.appendChild(qualification_sel);
            row.appendChild(qual);


            var spec=document.createElement("div");  /// appending the dynamically created nodes
            spec.id="spec"+counter;
            spec.setAttribute("class","col-lg-2");
            var lbl=document.createTextNode("Specialization");
            spec.appendChild(lbl);
            spec.appendChild(specialization_sel);
            row.appendChild(spec);


            var ct=document.createElement("div");  /// appending the dynamically created nodes
            ct.id="ct"+counter;
            ct.setAttribute("class","col-lg-2");
            lbl=document.createTextNode("Course-Type");
            ct.appendChild(lbl);
            ct.appendChild(course_type);
            row.appendChild(ct);


            var cy=document.createElement("div");  /// appending the dynamically created nodes
            cy.id="cy"+counter;
            cy.setAttribute("class","col-lg-2");
            lbl=document.createTextNode("Completed in");
            cy.appendChild(lbl);
            cy.appendChild(course_year);
            row.appendChild(cy);

            qualification_container.appendChild(row);


            ele.title="0"; // Important
        }
        else
        {
            temp=parseInt(counter,10)+1;
            $("#row"+temp).remove();
            $(".form-control.course_year"+counter).attr("disabled",true);$(".form-control.course_year"+counter).empty();
            $(".form-control.course_year"+counter).val("--Select--");
            $(".form-control.course_type"+counter).attr("disabled",true);//$(".form-control.course_type"+counter).empty();
            $(".form-control.specialization"+counter).attr("disabled",true);
            $(".form-control.course_type"+counter).val("--Select--");
            $(".form-control.specialization"+counter).val("--Select--");
            $(".form-control.specialization"+counter).empty();

        }
    }
    else
    {
        if(qualification=="12th Pass")
        {
            temp=parseInt(counter,10)+1;
            $("#row"+temp).remove();
            var x=$(".form-control.specialization"+counter); // enabling the rest of the three contents
            var dom_object=$(".form-control.specialization"+counter).get(0);
            x.removeAttr("disabled");
            x.empty();
            $(".form-control.course_type"+counter).removeAttr("disabled");
            $(".form-control.course_year"+counter).removeAttr("disabled");
            $.getJSON("ajax_query.php",{qua:qualification},function(data)
            {
                var len=data.length;                            // filling in the details according to qualification in specification select
                addOption(dom_object,"--Select--","");
                for(i=0;i<len;i++)
                {
                    addOption(dom_object,data[i].spl,data[i].spl);
                }
            });
        }
        else
        {
            temp=parseInt(counter,10)+1;
            $("#row"+temp).remove();
            $(".form-control.course_year"+counter).attr("disabled",true);$(".form-control.course_year"+counter).empty();
            $(".form-control.course_year"+counter).val("--Select--");
            $(".form-control.course_type"+counter).attr("disabled",true);
            $(".form-control.course_type"+counter).val("--Select--");
            $(".form-control.specialization"+counter).attr("disabled",true);
            $(".form-control.specialization"+counter).val("--Select--");
            $(".form-control.specialization"+counter).empty();
        }
    }
}

$(document).ready(function (e){ //code for adding/removing languages
    $.getJSON("ajax_query.php",{lang:"lang"},function(data){
        max_lang=data.length;
        for(var i=0;i<data.length;i++)//loading all language into mem frm db
        {
            lang_array[i]=data[i].language;
            addOption(document.getElementById("lang0"),data[i].language,data[i].language);
        }
        unsel_lang_array=lang_array;
    });

    $("#remove_lang").css("display","none");

    $("#add_lang").click(function(e){
        var last_div=$("#lang_container div:last-child");
        var id=last_div.attr("id"); // finding the id no. to be given to generated fields
        //alert(last_div.attr("class"));
        $("#lang_cotainer").children().css("border","3px double red");
        id=id.substr(8,id.length-8);
        if(id==(max_lang-2))
            $("#add_lang").css("display","none");
        if(id<max_lang-1)
        {
            id++;
            $("#remove_lang").css("display","inline");

            var row=document.createElement("div");
            row.setAttribute("class","row");
            row.id="lang_div"+id;

            var empty=document.createElement("div");
            empty.setAttribute("class","col-lg-1");
            row.appendChild(empty);

            var txt=document.createElement("div"); //language label
            txt.setAttribute("class","col-lg-1");
            txt.id="lang_name"+id;
            txt.appendChild(document.createElement("br"));
            txt.appendChild(document.createTextNode("Language "+(id+1)));
            row.appendChild(txt);

            var lang_field_div=document.createElement("div");// dynamically generating the fields
            lang_field_div.setAttribute("class","col-lg-2");
            lang_field_div.appendChild(document.createElement("br"));
            var lang_sel=document.getElementById("lang0").cloneNode(true);
            //creating language selection with remaining options for selection
            lang_sel.id="lang"+id;
            lang_sel.setAttribute("name","lang"+id);
            lang_sel.setAttribute("class","form-control");
            lang_sel.setAttribute("onchange","lang_manage(this,this.value)");
            lang_field_div.appendChild(lang_sel);

            var speak_div=document.createElement("div");
            speak_div.appendChild(document.createTextNode("Speak :"));
            var speak_sel=document.getElementById("speak0").cloneNode(true);
            speak_sel.id="speak"+id;
            speak_sel.setAttribute("name","speak"+id);
            speak_div.setAttribute("class","col-lg-2");
            speak_sel.setAttribute("class","form-control");
            speak_div.appendChild(speak_sel);

            var write_div=document.createElement("div");
            write_div.appendChild(document.createTextNode("Write :"));
            write_div.setAttribute("class","col-lg-2");
            var write_sel=document.getElementById("write0").cloneNode(true);
            write_sel.id="write"+id;
            write_sel.setAttribute("name","write"+id);
            write_sel.setAttribute("class","form-control");
            write_div.appendChild(write_sel);

            var read_div=document.createElement("div");
            read_div.appendChild(document.createTextNode("Read :"));
            var read_sel=document.getElementById("read0").cloneNode(true);
            read_sel.id="read"+id;
            read_div.setAttribute("class","col-lg-2");
            read_sel.setAttribute("name","read"+id);
            read_sel.setAttribute("class","form-control");
            read_div.appendChild(read_sel);

            row.appendChild(lang_field_div);
            row.appendChild(speak_div);
            row.appendChild(write_div);
            row.appendChild(read_div);
            document.getElementById('lang_container').appendChild(row);
        }
    });


    $("#remove_lang").click(function(e){
        $("#add_lang").css("display","inline");
        var last_div=$("#lang_container div:last-child");
        var id=last_div.attr("id");
        id=id.substr(8,id.length-8);
        $("#lang_div"+id).remove();
        if(id==1)
        {
            $("#remove_lang").css("display","none");
        }
    });

});

function lang_manage(x,language){
    var counter= x.id;
    var counter=counter.substr(4,counter.length-4);
    if(language!=""&&language!="--Select--")
    {
        $("#speak"+counter).removeAttr("disabled");
        $("#write"+counter).removeAttr("disabled");
        $("#read"+counter).removeAttr("disabled");
    }
    else
    {
        $("#speak"+counter).prop('selectedIndex',0);$("#speak"+counter).prop('selectedIndex',0);$("#read"+counter).prop('selectedIndex',0);
        $("#speak"+counter).attr("disabled",true);
        $("#write"+counter).attr("disabled",true);
        $("#read"+counter).attr("disabled",true);
    }
}

