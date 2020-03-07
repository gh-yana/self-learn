print('start')

import sam_webcam_cap
import sam_img_detect

for i in range(3):
    print(i)
    #import sam_webcam_cap
    sam_webcam_cap.proc()
    #import sam_img_detect
    sam_img_detect.proc()
    import sam_postIMG_2Slack
else:
    print('end')

