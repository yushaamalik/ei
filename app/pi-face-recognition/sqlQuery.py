import mysql.connector
from mysql.connector import Error




connection = mysql.connector.connect(host='localhost',
                                    database='faceattendance',
                                    user='root',
                                    password='')

mySql_insert_query = """INSERT INTO attendances (student_id, status) 
                    VALUES 
                    (1, "Present") """

cursor = connection.cursor()
cursor.execute(mySql_insert_query)
connection.commit()
print(cursor.rowcount, "Record inserted successfully into Laptop table")
cursor.close()

