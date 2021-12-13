# -*- coding: utf-8 -*-
"""
Created on Fri Dec 10 13:37:22 2021

@author: ASUS
"""
import pandas as pd
import sys


data = pd.read_csv('data/weatherAUS.csv')
 
# Calling DataFrame constructor on list

          


def getTemp(kota):
    df_kota = data.loc[data['Location'] == kota] 
    temp = df_kota.loc[len(df_kota)-1]['MinTemp']
    return temp

def getCuaca(kota):
    df_kota = data.loc[data['Location'] == kota] 
    isHjn = df_kota.loc[len(df_kota)-1]['RainToday']
    if(isHjn == 'No'):
        return 'Cerah'
    else:
        return 'Hujan'
    
def getTempDate(kota, tanggal):
    df_kota = data.loc[data['Location'] == kota] 
    df_tgl = df_kota.loc[data['Date'] == tanggal]
    temp = df_tgl['MinTemp']
    return temp

def getWindSpeedDate(kota, tanggal):
    df_kota = data.loc[data['Location'] == kota] 
    df_tgl = df_kota.loc[data['Date'] == tanggal]
    temp = df_tgl['WindSpeed9am']
    return temp

def getHumidityDate(kota, tanggal):
    df_kota = data.loc[data['Location'] == kota] 
    df_tgl = df_kota.loc[data['Date'] == tanggal]
    temp = df_tgl['Humidity9am']
    return temp

def getRainfallDate(kota, tanggal):
    df_kota = data.loc[data['Location'] == kota] 
    df_tgl = df_kota.loc[data['Date'] == tanggal]
    temp = df_tgl['Rainfall']
    return temp

def getLastDate(kota):
    df_kota = data.loc[data['Location'] == kota] 
    return df_kota.loc[len(df_kota)-1]['Date']

pjg_param = len(sys.argv)

if(pjg_param == 3):
    tanggal = sys.argv[3]
    kota = sys.argv[2]
    keterangan = sys.argv[1]
    if(keterangan == 'Suhu'):
        print(getTempDate(kota, tanggal))
    elif(keterangan == 'WindSpeed'):
        print(getWindSpeedDate(kota, tanggal))
    elif(keterangan == 'Humidity'):
        print(getHumidityDate(kota, tanggal))
    else:
        print(getRainfallDate(kota, tanggal))
elif(pjg_param == 2):
    kota = sys.argv[2]
    keterangan = sys.argv[1]
    if(keterangan == 'Suhu'):
        print(getTemp(kota))
    else:
        print(getCuaca(kota))
else:
    kota = sys.argv[1]
    print(getLastDate(kota))



# df_kota = data.loc[data['Location'] == 'Albury'] 
# df_tgl = df_kota.loc[data['Date'] == '6/24/2017']
# print(getTempDate('Albury', '6/24/2017'))
#     # getTempDate('Albury', '6/24/2017')
    
