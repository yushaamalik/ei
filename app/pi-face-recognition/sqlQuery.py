import mysql.connector
from mysql.connector import Error
from datetime import date




connection = mysql.connector.connect(host='localhost',
                                    database='ei',
                                    user='root',
                                    password='')

mycursor = connection.cursor()
  
# Execute the query
todayDate = str(date.today())
rollNumber = str(436)
print(todayDate)
query = "SELECT count(id) FROM attendances WHERE rollNumber = "+rollNumber+" AND created_at = '"+todayDate+"' ;" 
mycursor.execute(query)
  
myresult = mycursor.fetchall()
print(mycursor._executed)
  
print(myresult[-1][-1])
  
# Close database connection
connection.close()

# WHERE rollNumber = " +name+ " AND created_at = "+date.today()+" 