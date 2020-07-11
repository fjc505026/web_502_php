

/******************************************AUTHOR STATEMENT************************************************/
        I declare that all material in this assignment is my own work except where there is clear
        acknowledgement or reference to the work of others. I am aware that my assignment may be
        submitted to plagiarism detection software, and might be retained on its database. I have read
        and complied with the University statement on Plagiarism and Academic Integrity on the
        University website at www.utas.edu.au/plagiarism.
        I will keep a copy of this assignment until results have been finalised.
/*********************************************************************************************************/
Notice :  all current user password set to 'Fjc070910@' , for easy test, there is account like 'ddc' is DC role(access 5), 'duc' is UC role(access 4), 'dlectuer'  is lecturer role(access 3),
    'dtutor' is tutor role(access 2), 'jfan' is student role (access 1), new register staff as tutor.


File structure: php file includes all pages show in the website, action file includes all the data request and data change. template has header.php and footer.php only works for
index.php(mainpage), but has head.php and foot.php in php file for other php pages. JSON file not used, just for assignment1.

1. all current user password set to Fjc070910@
2. username will automatically be generated which consists of first bit of firstname and lastname and id (studentid or staffid)
3. one user could have mutiple rols, like student or staff, but need add directly in database(assign both student id and staff id)
4. Account detail access from clicking the welcome banner on the top right.
5. unit staff allocation, when allocate staff, it need remove the name and input the staff id then change, if not valid staff ID, it would not change
6. Consultation hours not implemented
7. In unit managementm it not implemented add or remove tutoral and lecture, but you can change time and staff by enter and change.
8. Unit hand book(detail) , click the row will show detail information
9. for easy test, there is account like 'ddc' is DC role(access 5), 'duc' is UC role(access 4), 'dlectuer'  is lecturer role(access 3),
    'dtutor' is tutor role(access 2), 'jfan' is student role (access 1), new register staff as tutor.
10.The timetable data comes from a json file (sample.json) which I use json_encode() and file_write(), I already changed the mod of file as 777 access right in the code(Timetabledata.php),
if not works check the file access right. sometimes it because there is space after the day ,start_time and end_time.
11. Timetable and button sometimes not work due to the browers verison, try another browser.


Bugs:
1.Timetable(the picture) may have error when time slot overlap
2.staff could enroll more than one activities but only show one in current teaching unit in stafflist, if the staff is the UC of that unit, it only show UC,
but you can find the activities already enroll when you click remove button (due to the datebase desgin)
3. The units table in datebase design has problems, the lecturer is unit coordinator, id and unit_code, the units.semester and activity.period  are redundancy,
because this originally comes from that table desgin in tutorial 7, it hard to change when all the framework already done,this is indeed a fundamental mistake and sorry for this.


References :
Dvirazulay , 'timetable  template' <http://jsfiddle.net/dvirazulay/Lhe7C/>
Kondratiev S,unsplash， image, <https://unsplash.com/@technobulka>
ifufutor ,'Emma Watson Study 'redbubble,image, <https://www.redbubble.com/people/ifufutor/works/16393797-emma-watson-study>
Leschemelle, Thomason, Kuhns (2016) 'Tabltedit library' <https://markcell.github.io/jquery-tabledit/#home>