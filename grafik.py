# -*- coding: utf-8 -*-
import sys
import pandas as pd
import numpy as np
import pickle
import matplotlib.pyplot as plt
from datetime import datetime, time, timedelta

df_weather = pd.read_csv("data/weatherAUS.csv")
df_weather = df_weather.fillna(df_weather.median())

pjg_param = len(sys.argv)
tanggal = []
if(pjg_param == 3):
  tanggal1 = sys.argv[2]
  tanggal.append(tanggal1)
else:
  tanggal1 = datetime.strptime(sys.argv[2], '%Y-%m-%d').date()
  tanggal2 = datetime.strptime(sys.argv[3], '%Y-%m-%d').date()
  tanggal.append(tanggal1.strftime("%m/%d/%Y"))
  while(tanggal1 != tanggal2):
      tanggal1 += timedelta(1)
      tanggal.append(tanggal1.strftime("%m/%d/%Y"))
      
# tanggal = ["12/01/2008","12/02/2008","12/03/2008"]

cols = {'temp9am':[], 'temp3pm':[], 'windspeed9am':[], 'windspeed3pm':[], 'humidity9am':[], 'humidity3pm':[], 'rainfall':[]}

for x in range(len(tanggal)):
  for i in range(len(df_weather['Date'])):
    if (df_weather['Date'][i] == tanggal[x] and df_weather['Location'][i] == sys.argv[1]):
      cols['temp9am'].append(df_weather['Temp9am'][i])
      cols['temp3pm'].append(df_weather['Temp3pm'][i])
      cols['windspeed9am'].append(df_weather['WindSpeed9am'][i])
      cols['windspeed3pm'].append(df_weather['WindSpeed3pm'][i])
      cols['humidity9am'].append(df_weather['Humidity9am'][i])
      cols['humidity3pm'].append(df_weather['Humidity3pm'][i])
      cols['rainfall'].append(df_weather['Rainfall'][i])
      break

kiri = range(0, len(tanggal))
x2 = tanggal
y2 = cols['temp3pm']
plt.plot(x2, y2, label = "Temp at 3PM", marker='8')
x1 = tanggal
y1 = cols['temp9am']
plt.plot(x1, y1, label = "Temp at 9AM", marker='8')
 
plt.xlabel('Date')
plt.ylabel('Degree Celcius')

plt.title('Temperatur on 9AM & 3PM')
 
plt.grid()
plt.legend()
plt.savefig('images/Temperatur.png')

plt.figure().clear()
kiri = range(0, len(tanggal))
x2 = tanggal
y2 = cols['windspeed3pm']
plt.plot(x2, y2, label = "Windspeed at 3PM", marker='8')
x1 = tanggal
y1 = cols['windspeed9am']

plt.plot(x1, y1, label = "Windspeed at 9AM", marker='8')
 
plt.xlabel('Date')
plt.ylabel('Windspeed KM/H')

plt.title('Windspeed on 9AM & 3PM')
 
plt.grid()
plt.legend()
plt.savefig('images/Windspeed.png')

plt.figure().clear()
kiri = range(0, len(tanggal))
x2 = tanggal
y2 = cols['humidity3pm']
plt.plot(x2, y2, label = "Humidity at 3PM", marker='8')
x1 = tanggal
y1 = cols['humidity9am']
plt.plot(x1, y1, label = "Humidity at 9AM", marker='8')
 

 
plt.xlabel('Date')
plt.ylabel('Humidity in %')

plt.title('Humidity on 9AM & 3PM')
 
plt.grid()
plt.legend()
plt.savefig('images/Humidity.png')

plt.figure().clear()
kiri = range(0, len(tanggal))
x1 = tanggal
y1 = cols['rainfall']
plt.plot(x1, y1, label = "Rainfall", marker='8')
 

 
plt.xlabel('Date')
plt.ylabel('Rainfall')

plt.title('Rainfall')
 
plt.grid()
plt.legend()
plt.savefig('images/Rainfall.png')