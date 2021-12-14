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
from datetime import datetime

datetime_object = datetime.strptime('2008-12-02 00:00:00', '%m/%d/%Y').date()
datetime_object2 = datetime.strptime('2/2/2000', '%m/%d/%Y').date()
print(datetime_object)