import sys
# # print ("yourmom")
# result=int(sys.argv[1]) + int(sys.argv[2])
# #result=str(sys.argv)
# print(result)


# rainfall=(sys.argv[1])
# sunshine=(sys.argv[2])
# humidity9am=(sys.argv[3])
# humidity3pm=(sys.argv[4])
# cloud3pm=(sys.argv[5])

# #print(rainfall+" "+sunshine+" "+humidity9am+" "+humidity3pm+" "+cloud3pm)
# print("hujan")

#res=[11,222,69]
#res=[10,255,3]
from datetime import datetime, time, timedelta

# datetime_object = datetime.strptime('2008-12-02 00:00:00', '%m/%d/%Y').date()
datetime_object2 = datetime.strptime('2/2/2000', '%m/%d/%Y').date()
print(datetime_object2)
datetime_object2 += timedelta(1)
print(datetime_object2)
print('aaaa' == 'aaaa')
import matplotlib.pyplot as plt
import numpy as np

# generate 100 nilai dari -5 hingga 5
x = np. linspace(-5,5,100)
# hitung y untuk masing-masing nilai x
y = x*x*x+2*x-2
# gunakan fungsi plot untuk menggambar fungsi y
plt.plot(x,y,'r')

plt.savefig('images/gambar.png')

