import cv2
from threading import Thread
import imutils
from imutils import face_utils
import time
import dlib
import pickle5 as pickle
from datetime import date


import face_recognition
import mysql.connector
from mysql.connector import Error


face=None
boxes=None

CONSEC_FRAMES=15
COUNTER = 0

mydb = mysql.connector.connect(
	host="localhost",
	user="root",
	password="",
	database="ei")

# sql="INSERT INTO attendances (student_id, status) VALUES (%s, %s)"
# val=("1", "PRESENT")


def recognize_face(image):
    rgb_image = image[:, :, ::-1]
    encodings = face_recognition.face_encodings(rgb_image, boxes)
    names = []
    for encoding in encodings:
        matches = face_recognition.compare_faces(data["encodings"],encoding,tolerance=0.49)
        name = "Unknown"
        if True in matches:
            matchedIdxs = [i for (i, b) in enumerate(matches) if b]
            counts = {}
            for i in matchedIdxs:
                name = data["names"][i]
                counts[name] = counts.get(name, 0) + 1
                
            name = max(counts, key=counts.get)

        names.append(name)
        for ((top, right, bottom, left), name) in zip(boxes, names):
            cv2.rectangle(image, (left, top), (right, bottom),(0, 255, 0), 2)
            y = top - 15 if top - 15 > 15 else top + 15
            dt=time.strftime("%d-%m-%y")
            tm=time.strftime("%X")
            cv2.putText(image, "Name: "+name, (left, y-40), cv2.FONT_HERSHEY_SIMPLEX,0.5, (0, 255, 0), 2)
            cv2.putText(image, "Date: "+dt, (left, y-20), cv2.FONT_HERSHEY_SIMPLEX,0.5, (0, 255, 0), 2)
            cv2.putText(image, "Time: "+tm, (left, y), cv2.FONT_HERSHEY_SIMPLEX,0.5, (0, 255, 0), 2)
            cv2.putText(image, "Present: ", (left, y+20), cv2.FONT_HERSHEY_SIMPLEX,0.5, (0, 255, 0), 2)

            todayDate = str(date.today())
            rollNumber = str(name)
            query = "SELECT count(id) FROM attendances WHERE rollNumber = "+rollNumber+" AND created_at = '"+todayDate+"' ;"
            cursor = mydb.cursor()

            cursor.execute(query)
            
            myresult = cursor.fetchall()
            
            # print(myresult[-1][-1])
            if(myresult[-1][-1] == 0):
                mySql_insert_query = "INSERT INTO attendances (rollNumber, status, created_at) VALUES (%s, %s, %s)"
                val = (name, "Present", date.today())
                cursor = mydb.cursor()
                cursor.execute(mySql_insert_query, val)
                mydb.commit()

           
            # break
            # exit()
            
            

    cv2.imshow('Recognized image',image[20:450,30:630])


                                                 
    '''
    face_locations = face_recognition.face_locations(rgb_image)
    print(boxes)
    print(face_locations)
    for (top, right, bottom, left) in face_locations:
        cv2.rectangle(image, (left, top), (right, bottom), (255, 0, 0), 2)
    '''
    
   

cap=cv2.VideoCapture(0)

detector = dlib.get_frontal_face_detector()
picklePath = 'C:\laragon\www\ei/app/pi-face-recognition/encodings.pickle'
data = pickle.loads(open(picklePath, "rb").read())


while True:

    ret,frame=cap.read()

    cv2.line(frame,(235,10),(235,470),(255,30,10),1)
    cv2.line(frame,(405,10),(405,470),(255,30,10),1)
    cv2.putText(frame, "Align your face between lines", (10, 10), cv2.FONT_HERSHEY_SIMPLEX,0.5, (255, 255, 255), 1)
    
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    rects = detector(gray, 0)

    for rect in rects:
        (x, y, w, h) = face_utils.rect_to_bb(rect)
        c=x+(w/2)
        if c<405 and c>235:
            COUNTER+=1
        else:
            COUNTER=0
        
        boxes=[(int(y),int(x+w),int(y+h),int(x))]
        cv2.rectangle(frame, (x, y), (x + w, y + h), (0, 255, 0), 2)
        #face=frame[y-10:y+h+20,x-10:x+w+20]
        line_increament=int((COUNTER/CONSEC_FRAMES)*630)
        cv2.line(frame,(10,15),(line_increament,15),(255,0,0),3)
        
        if COUNTER >= CONSEC_FRAMES:
            recognize_face(frame)
            time.sleep(10)
            COUNTER = 0
            
        
    cv2.imshow('frame',frame)
    key = cv2.waitKey(1) & 0xFF

    if key==ord("q"):
        break

    if key==ord("s"):
        recognize_face(frame)
        

cv2.destroyAllWindows()
cap.release()
    
    
