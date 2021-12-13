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

# kota = sys.argv[2]
# keterangan = sys.argv[1]
# if(keterangan == 'Suhu'):
#     print(getTemp(kota))
# else:
#     print(getCuaca(kota))


df_kota = data.loc[data['Location'] == 'Albury']
df_tgl = df_kota.loc[data['Date'] == '6/24/2017']
print(getTempDate('Albury', '6/24/2017')+5)
# getTempDate('Albury', '6/24/2017')
