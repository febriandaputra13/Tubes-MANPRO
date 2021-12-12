# -*- coding: utf-8 -*-
"""Grafik

Automatically generated by Colaboratory.

Original file is located at
    https://colab.research.google.com/drive/1au1YFWiobPHBFU9JWleRzb9x-jvqbRLw
"""

import pandas as pd
import numpy as np
import pickle
import matplotlib.pyplot as plt

from google.colab import drive
drive.mount('/content/drive')

df_weather = pd.read_csv("/content/drive/MyDrive/PPDP/weather_uts.csv")

tanggal = []
for banyaktgl in len(input dalam bentuk list):
  tanggal.append(input apapun dalam list index ke [banyaktgl])


#coba coba
#tanggal = ["2008-12-01","2008-12-02","2008-12-03"]

cols = {'temp9am':[], 'temp3pm':[], 'windspeed9am':[], 'windspeed3pm':[], 'humidity9am':[], 'humidity3pm':[], 'rainfall':[]}

for x in range(len(tanggal)):
  for i in range(len(df_weather['Date'])):
    if df_weather['Date'][i] == tanggal[x]:
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
plt.plot(x2, y2, label = "Temp at 3PM")
x1 = tanggal
y1 = cols['temp9am']
plt.plot(x1, y1, label = "Temp at 9AM")
 
plt.xlabel('Date')
plt.ylabel('Degree Celcius')

plt.title('Temperatur on 9AM & 3PM')
 
plt.grid()
plt.legend()
plt.show()
#plt.savefig('Temperatur.jpeg')

kiri = range(0, len(tanggal))
x2 = tanggal
y2 = cols['windspeed3pm']
plt.plot(x2, y2, label = "Windspeed at 3PM")
x1 = tanggal
y1 = cols['windspeed9am']
plt.plot(x1, y1, label = "Windspeed at 9AM")
 

 
plt.xlabel('Date')
plt.ylabel('Windspeed KM/H')

plt.title('Windspeed on 9AM & 3PM')
 
plt.grid()
plt.legend()
plt.show()
#plt.savefig('Windspeed.jpeg')

kiri = range(0, len(tanggal))
x2 = tanggal
y2 = cols['humidity3pm']
plt.plot(x2, y2, label = "Humidity at 3PM")
x1 = tanggal
y1 = cols['humidity9am']
plt.plot(x1, y1, label = "Humidity at 9AM")
 

 
plt.xlabel('Date')
plt.ylabel('Humidity in %')

plt.title('Humidity on 9AM & 3PM')
 
plt.grid()
plt.legend()
plt.show()
#plt.savefig('Windspeed.jpeg')

kiri = range(0, len(tanggal))
x1 = tanggal
y1 = cols['rainfall']
plt.plot(x1, y1, label = "Rainfall")
 

 
plt.xlabel('Date')
plt.ylabel('Rainfall')

plt.title('Rainfall')
 
plt.grid()
plt.legend()
plt.show()
#plt.savefig('Rainfall.jpeg')