import cv2
import base64

cap = cv2.VideoCapture(0)

while True:
    ret, frame = cap.read()
    
    # Convert to base64 encoding and show start of data
    jpg_as_text = base64.b64encode(frame)
    print(jpg_as_text)
    
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

cap.release()
cv2.destroyAllWindows()
