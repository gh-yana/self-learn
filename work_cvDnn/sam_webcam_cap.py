def proc(): 

    import cv2

    cap = cv2.VideoCapture(0)

    if cap.isOpened() is False:
       print('IO Error')
    else:
       ret, img = cap.read()
       if ( ret == True ):
          height = img.shape[0] #高さ
          width = img.shape[1] #幅
          resize_img = cv2.resize(img, (int(width*0.5), int(height*0.5)))
          cv2.imwrite('/home/pi/OpencvDnn/temp/cap-test.jpg',resize_img)
       else:
          print('Read Error')

    cap.release()



